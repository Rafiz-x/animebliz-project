<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class GenreController extends Controller
{
    public function all(Request $req)
    {
        $query = Genre::query();

        if ($req->filled('search')) {
            $search = $req->input('search');
            $query->where('name', 'LIKE', "{$search}%");
        }

        if ($req->filled('filter')) {
            $filter = $req->input('filter');
            $order = 'asc';

            if (strpos($filter, '_asc') !== false) {
                $column = str_replace('_asc', '', $filter);
            } elseif (strpos($filter, '_desc') !== false) {
                $column = str_replace('_desc', '', $filter);
                $order = 'desc';
            } else {
                return response()->json(['msg' => 'Invalid filter value'], 400);
            }

            $query->orderBy($column, $order);
        }

        $genres = $query->paginate(10);

        // if ($req->ajax()) {
        //     $paginationLinks = view('components.pagination-links', ['genres' => $genres])->render();
        //     $filteredGenre = view('components.filtered-genre', ['genres' => $genres])->render();
        //     return response()->json(['html' => $filteredGenre, 'pagination' => $paginationLinks]);
        // }
        if ($req->ajax()) {
            $filteredGenre = view('components.filtered-genre', ['genres' => $genres])->render();
            return response()->json(['html' => $filteredGenre]);
        }

        return view('admin.genre.all', ['genres' => $genres]);
    }

    public function create()
    {
        $genres = Genre::all();

        return view('admin.genre.create', ['genres' => $genres]);
    }

    public function handleCreate(Request $req)
    {
        // Validate the request
        $validated = $req->validate([
            'genre_name' => 'required|string',
            'slug_type' => 'required|in:auto,custom',
            'genre_slug' => 'required|string|unique:genre,slug',
        ]);

        // Validating slug
        $validated['genre_slug'] = Str::slug($validated['genre_name']);

        // Create a new genre
        $genre = new Genre();
        $genre->name = $validated['genre_name'];
        $genre->slug = $validated['genre_slug'];
        $genre->save();

        return response()->json([
            'msg' => 'Genre created successfully!',
        ]);
    }

    public function edit($slug)
    {
        try {
            $currentGenre = Genre::where('slug', $slug)->firstOrFail();
            $genres = Genre::whereNotIn('slug', [$slug])->pluck('slug', 'name');
            $genreFound = true;
        } catch (ModelNotFoundException $e) {
            // Handle case where genre is not found
            $currentGenre = null;
            $genres = collect(); // Empty collection
            $genreFound = false;
        }
        // dd($genres);

        return view('admin.genre.edit', compact('genres', 'currentGenre', 'genreFound'));
    }

    public function handleEdit(Request $req)
    {
        // Validate the request
        $validated = $req->validate([
            'genre_id' => 'required|exists:genre,id',
            'genre_name' => 'required|string',
            'genre_slug' => 'required|string',
            'slug_type' => 'required|in:auto,custom',
        ]);

        // Fetch the genre by ID
        $genre = Genre::findOrFail($validated['genre_id']);

        // Check if the new genre name is different from the existing one
        if ($genre->name === $validated['genre_name']) {
            throw ValidationException::withMessages([
                'genre_name' => 'The new genre name must be different from the current name.'
            ]);
        }

        // Validate that the new genre name is unique
        if (Genre::where('name', $validated['genre_name'])->whereNot('id', $req->genre_id)->exists()) {
            throw ValidationException::withMessages([
                'genre_name' => 'The genre name has already been taken.'
            ]);
        }

        // Set the slug based on the slug_type
        if ($validated['slug_type'] === 'auto') {
            $validated['genre_slug'] = Str::slug($validated['genre_name']);
        }

        // Check if the slug is unique
        if (Genre::where('slug', $validated['genre_slug'])->exists() && $genre->slug !== $validated['genre_slug']) {
            throw ValidationException::withMessages([
                'genre_slug' => 'The slug has already been taken.'
            ]);
        }

        // Update the genre
        $genre->name = $validated['genre_name'];
        $genre->slug = $validated['genre_slug'];
        $genre->save();

        return response()->json([
            'msg' => 'Genre updated successfully!',
        ]);
    }


    public function selectEdit()
    {
        $genres = Genre::all();

        return view('admin.genre.selectEdit', ['genres' => $genres]);
    }

    public function delete()
    {
        return view('admin.genre.delete');
    }

    public function checkGenres(Request $req)
    {
        if ($req->has('genre')) {
            $genre = $req->query('genre');

            if ($req->has('without')) {
                $withoutGenre = $req->query('without');
                $getGenre = Genre::where('name', $genre)->whereNot('name', $withoutGenre)->get();
            } else {
                $getGenre = Genre::where('name', $genre)->get();
            }

            if ($getGenre->isEmpty()) {
                return response()->json(['found' => false]);
            } else {
                return response()->json(['found' => true]);
            }
        } else {
            $genresString = $req->query('genres');
            // $genresString = str_replace('"', '', $genresString);
            $genresNames = explode(',', $genresString);

            $getGenres = Genre::whereIn('name', $genresNames)->get(['id', 'name']);

            if ($getGenres) {
                return response()->json(['success' => true, 'genres' => $getGenres]);
            }
            return response()->json(['success' => false, 'msg' => 'Genre(s) not found!']);
        }
    }
    public function checkSlug(Request $req)
    {
        if ($req->has('slug')) {
            $slug = $req->query('slug');

            if (!empty($slug)) {

                if ($req->has('without')) {
                    $withoutSlug = $req->query('without');
                    $getGenre = Genre::where('slug', $slug)->whereNot('slug', $withoutSlug)->get();
                } else {
                    $getGenre = Genre::where('slug', $slug)->get();
                }

                if ($getGenre->isEmpty()) {
                    return response()->json(['found' => false]);
                } else {
                    return response()->json(['found' => true]);
                }
            }
        } else {
            abort(404);
        }
    }

    public function deleteGenres(Request $request)
    {

        if ($request->has('genres')) {
            // Handle Multiple Genres
            $genresString = urldecode($request->query('genres'));
            $genreSlugs = explode('|', $genresString); // Change delimiter to pipe character

            // Fetch genres from the database
            $getGenres = Genre::whereIn('slug', $genreSlugs)->get(['slug']);

            $foundGenreSlugs = $getGenres->pluck('slug')->map(function ($slug) {
                return strtolower(trim($slug));
            })->toArray();

            $missingGenreSlugs = [];

            foreach ($genreSlugs as $slug) {
                $normalizedSlug = strtolower(trim($slug));
                if (!in_array($normalizedSlug, $foundGenreSlugs)) {
                    $missingGenreSlugs[] = $normalizedSlug;
                }
            }



            // Determine the response status
            $status = !empty($missingGenreSlugs) ? 404 : 200;

            if ($missingGenreSlugs) {
                $response = [
                    'missing' => $missingGenreSlugs
                ];

                return response()->json($response, $status);
            } else {
                $deletedRows = Genre::whereIn('slug', $genreSlugs)->delete();
                return response()->json([
                    'msg' => 'Deleted Successfully'
                ]);
            }
        } else {
            return response()->json([
                'msg' => 'genres parameter not found (javacript error).'
            ], 400);
        }
    }
}
