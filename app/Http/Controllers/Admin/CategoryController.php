<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
      public function all(Request $req)
    {
        $query = Category::query();

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

        $categories = $query->paginate(10);

        if ($req->ajax()) {
            $filteredCategory = view('components.filtered-category', ['categories' => $categories])->render();
            return response()->json(['html' => $filteredCategory]);
        }

        return view('admin.category.all', ['categories' => $categories]);
    }




    public function create()
    {
        $categories = Category::all();

        return view('admin.category.create', ['categories' => $categories]);
    }

    public function handleCreate(Request $req)
    {
        // Validate the request
        $validated = $req->validate([
            'category_name' => 'required|string',
            'slug_type' => 'required|in:auto,custom',
            'category_slug' => 'required|string|unique:category,slug',
        ]);

        // Validating slug
        $validated['category_slug'] = Str::slug($validated['category_name']);

        // Create a new category
        $category = new Category();
        $category->name = $validated['category_name'];
        $category->slug = $validated['category_slug'];
        $category->save();

        return response()->json([
            'msg' => 'Category created successfully!',
        ]);
    }

    public function edit($slug)
    {
        try {
            $currentCategory = Category::where('slug', $slug)->firstOrFail();
            $categories = Category::whereNotIn('slug', [$slug])->pluck('slug', 'name');
            $categoryFound = true;
        } catch (ModelNotFoundException $e) {
            // Handle case where category is not found
            $currentCategory = null;
            $categories = collect(); // Empty collection
            $categoryFound = false;
        }
        // dd($categories);

        return view('admin.category.edit', compact('categories', 'currentCategory', 'categoryFound'));
    }

    public function handleEdit(Request $req)
    {
        // Validate the request
        $validated = $req->validate([
            'category_id' => 'required|exists:category,id',
            'category_name' => 'required|string',
            'category_slug' => 'required|string',
            'slug_type' => 'required|in:auto,custom',
        ]);

        // Fetch the category by ID
        $category = Category::findOrFail($validated['category_id']);

        // Check if the new category name is different from the existing one
        if ($category->name === $validated['category_name']) {
            throw ValidationException::withMessages([
                'category_name' => 'The new category name must be different from the current name.'
            ]);
        }

        // Validate that the new category name is unique
        if (Category::where('name', $validated['category_name'])->whereNot('id', $req->category_id)->exists()) {
            throw ValidationException::withMessages([
                'category_name' => 'The category name has already been taken.'
            ]);
        }

        // Set the slug based on the slug_type
        if ($validated['slug_type'] === 'auto') {
            $validated['category_slug'] = Str::slug($validated['category_name']);
        }

        // Check if the slug is unique
        if (Category::where('slug', $validated['category_slug'])->exists() && $category->slug !== $validated['category_slug']) {
            throw ValidationException::withMessages([
                'category_slug' => 'The slug has already been taken.'
            ]);
        }

        // Update the category
        $category->name = $validated['category_name'];
        $category->slug = $validated['category_slug'];
        $category->save();

        return response()->json([
            'msg' => 'Category updated successfully!',
        ]);
    }


    public function selectEdit()
    {
        $categories = Category::all();

        return view('admin.category.selectEdit', ['categories' => $categories]);
    }

    public function delete()
    {
        return view('admin.category.delete');
    }

    public function checkCategories(Request $req)
    {
        if ($req->has('category')) {
            $category = $req->query('category');

            if ($req->has('without')) {
                $withoutCategory = $req->query('without');
                $getCategory = Category::where('name', $category)->whereNot('name', $withoutCategory)->get();
            } else {
                $getCategory = Category::where('name', $category)->get();
            }

            if ($getCategory->isEmpty()) {
                return response()->json(['found' => false]);
            } else {
                return response()->json(['found' => true]);
            }
        } else {
            $categoriesString = $req->query('categories');
            // $categoriesString = str_replace('"', '', $categoriesString);
            $categoriesNames = explode(',', $categoriesString);

            $getCategories = Category::whereIn('name', $categoriesNames)->get(['id', 'name']);

            if ($getCategories) {
                return response()->json(['success' => true, 'categories' => $getCategories]);
            }
            return response()->json(['success' => false, 'msg' => 'Category(s) not found!']);
        }
    }
    public function checkSlug(Request $req)
    {
        if ($req->has('slug')) {
            $slug = $req->query('slug');

            if (!empty($slug)) {

                if ($req->has('without')) {
                    $withoutSlug = $req->query('without');
                    $getCategory = Category::where('slug', $slug)->whereNot('slug', $withoutSlug)->get();
                } else {
                    $getCategory = Category::where('slug', $slug)->get();
                }

                if ($getCategory->isEmpty()) {
                    return response()->json(['found' => false]);
                } else {
                    return response()->json(['found' => true]);
                }
            }
        } else {
            abort(404);
        }
    }



    public function deleteCategories(Request $request)
    {

        if ($request->has('categories')) {
            // Handle Multiple Categories
            $categoriesString = urldecode($request->query('categories'));
            $categorySlugs = explode('|', $categoriesString); // Change delimiter to pipe character

            // Fetch categories from the database
            $getCategories = Category::whereIn('slug', $categorySlugs)->get(['slug']);

            $foundCategorySlugs = $getCategories->pluck('slug')->map(function ($slug) {
                return strtolower(trim($slug));
            })->toArray();

            $missingCategorySlugs = [];

            foreach ($categorySlugs as $slug) {
                $normalizedSlug = strtolower(trim($slug));
                if (!in_array($normalizedSlug, $foundCategorySlugs)) {
                    $missingCategorySlugs[] = $normalizedSlug;
                }
            }



            // Determine the response status
            $status = !empty($missingCategorySlugs) ? 404 : 200;

            if ($missingCategorySlugs) {
                $response = [
                    'missing' => $missingCategorySlugs
                ];

                return response()->json($response, $status);
            } else {
                $deletedRows = Category::whereIn('slug', $categorySlugs)->delete();
                return response()->json([
                    'msg' => 'Deleted Successfully'
                ]);
            }
        } else {
            return response()->json([
                'msg' => 'categories parameter not found (javacript error).'
            ], 400);
        }
    }
}
