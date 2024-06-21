<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;


use App\Models\Category;
use App\Models\Genre;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostGenre;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public $categories, $genres;

    public function __construct()
    {

        $this->categories = $categories = Category::all(['id', 'name']);
        $this->genres = $genres = Genre::all(['id', 'name']);
    }

    public function all(Request $req)
    {
        $query = Post::query();

        if ($req->filled('search')) {
            $search = $req->input('search');
            $query->where('title', 'LIKE', "{$search}%");
        }

        if ($req->filled('filter')) {
            $filter = $req->input('filter');

            $publishArr = ['published', 'not_published'];

            if (in_array($filter, $publishArr)) {
                if ($filter == 'published') {
                    $query->where('publish', 1);
                } else {
                    $query->where('publish', 0);
                }
            } else {

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
        }

        $posts = $query->paginate(10);

        if ($req->ajax()) {
            $filteredPost = view('components.filtered-post', ['posts' => $posts])->render();
            return response()->json(['html' => $filteredPost]);
        }

        return view('admin.post.all', ['posts' => $posts]);
    }

    public function create()
    {
        return view('admin.post.create', ['genres' => $this->genres, 'categories' => $this->categories]);
    }

    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->get();

        if ($post->isEmpty()) {
            abort(404, 'Post not found!');
        }
        $post = $post->first();

        $genreArray = $post->genres;
        $categoriesArray = $post->categories;

        $genreIds = PostGenre::where('post_id', $post->id)->pluck('genre_id')->toArray();
        // $postGenres = Genre::whereIn('id', $genreIds)->select('id', 'name')->get();

        $categoryIds = PostCategory::where('post_id', $post->id)->pluck('category_id')->toArray();
        // $postCategories = Category::whereIn('id', $categoryIds)->select('id', 'name')->get();

        $genres = $this->genres;
        $categories = $this->categories;

        return view('admin.post.edit', compact('post', 'genreIds', 'categoryIds', 'genres', 'categories'));
    }

    public function handleEdit(Request $req)
    {
        $postId = $req->input('post_id');

        // Validation rules
        $rules = [
            'imdb_id' => 'nullable|string',
            'tmdb_id' => 'nullable|string',
            'mal_id' => 'nullable|string',

            'publish' => 'required|boolean',
            'title' => 'required|string|unique:posts,title,' . $postId,
            'slug' => 'nullable|string|unique:posts,slug,' . $postId . '|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
            'type' => 'required|string',
            'isAnime' => 'required|boolean',
            'synopsis' => 'required|string',
            'ratingType' => 'required|string',
            'rating' => 'required|numeric|between:0,10',
            'releaseDate' => 'required|date_format:Y-m-d',
            'location' => 'required|string',

            'genre' => 'required|array',
            'genre.*' => 'integer|exists:genre,id',
            'category' => 'required|array',
            'category.*' => 'integer|exists:category,id',

            'poster_type' => 'required|string|in:url,custom',

            'default_poster_url' => 'required_if:poster_type,url|nullable|url',
            'large_poster_url' => 'nullable|url',
            'small_poster_url' => 'nullable|url',
            'poster_custom' => 'nullable|file|image|max:2048',

            'backdrop_type' => 'required|string|in:url,custom',

            'large_backdrop_url' => 'required_if:backdrop_type,url|nullable|url',
            'small_backdrop_url' => 'nullable|url',
            'backdrop_custom' => 'nullable|file|image|max:4096',
        ];

        // Define custom field names
        $customAttributes = [
            'publish' => 'Publish',
            'title' => 'Title',
            'slug' => 'Slug',
            'type' => 'Type',
            'isAnime' => 'Is Anime',
            'synopsis' => 'Synopsis',
            'ratingType' => 'Rating Type',
            'rating' => 'Rating',
            'releaseDate' => 'Release Date',
            'location' => 'Location',
            'genre' => 'Genre',
            'genre.*' => 'Genre',
            'category' => 'Category',
            'category.*' => 'Category',
            'poster_type' => 'Poster Type',
            'default_poster_url' => 'Default Poster URL',
            'large_poster_url' => 'Large Poster URL',
            'small_poster_url' => 'Small Poster URL',
            'poster_custom' => 'Poster Custom',
            'backdrop_type' => 'Backdrop Type',
            'large_backdrop_url' => 'Large Backdrop URL',
            'small_backdrop_url' => 'Small Backdrop URL',
            'backdrop_custom' => 'Backdrop Custom',
        ];

        // Create a validator instance with rules and custom attributes
        $validator = Validator::make($req->all(), $rules);
        $validator->setAttributeNames($customAttributes); // Set custom field names

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Get validated data
        $validatedData = $validator->validated();

        // Retrieve the post
        $post = Post::findOrFail($postId);

        // Update the post attributes
        $post->publish = $validatedData['publish'];
        $post->imdb_id = $validatedData['imdb_id'];
        $post->tmdb_id = $validatedData['tmdb_id'];
        $post->mal_id = $validatedData['mal_id'];
        $post->title = $validatedData['title'];
        $post->slug = $validatedData['slug'] ?? Str::slug($validatedData['title']);
        $post->type = $validatedData['type'];
        $post->is_anime = $validatedData['isAnime'];
        $post->synopsis = $validatedData['synopsis'];
        $post->rating_type = $validatedData['ratingType'];
        $post->rating = $validatedData['rating'];
        $post->release_date = $validatedData['releaseDate'];
        $post->location = $validatedData['location'];
        $post->genres = json_encode($validatedData['genre']);
        $post->categories = json_encode($validatedData['category']);

        // Checking Directories
        $postersDirectory = public_path('uploads/posters');
        $backdropsDirectory = public_path('uploads/backdrops');

        // Ensure the directories exist, create them if not
        if (!File::exists($postersDirectory)) {
            File::makeDirectory($postersDirectory, 0755, true, true);
        }

        if (!File::exists($backdropsDirectory)) {
            File::makeDirectory($backdropsDirectory, 0755, true, true);
        }

        // Update poster URLs if custom type and file is present
        // Update poster URLs
        $posterUrls = [];

        if ($req->poster_type === 'custom' && $req->hasFile('poster_custom')) {
            $posterCustom = $req->file('poster_custom');
            $posterExt = $posterCustom->getClientOriginalExtension();

            $posterImg = Image::read($posterCustom);
            $width = $posterImg->width();

            $posterLargeName = $this->randomNames($posterExt);
            $posterDefaultName = $this->randomNames($posterExt);
            $posterSmallName = $this->randomNames($posterExt);

            if ($width >= 500) {
                $posterImgPathLarge = $posterImg->scale(500)->save(public_path('uploads/posters/' . $posterLargeName));
                $posterImgPathDefault = $posterImg->scale(342)->save(public_path('uploads/posters/' . $posterDefaultName));
                $posterImgPathSmall = $posterImg->scale(185)->save(public_path('uploads/posters/' . $posterSmallName));

                $posterUrls = [
                    'large' => $posterLargeName,
                    'default' => $posterDefaultName,
                    'small' => $posterSmallName,
                ];
            } elseif ($width >= 342) {
                $posterImgPathDefault = $posterImg->scale(342)->save(public_path('uploads/posters/' . $posterDefaultName));
                $posterImgPathSmall = $posterImg->scale(185)->save(public_path('uploads/posters/' . $posterSmallName));

                $posterUrls = [
                    'default' => $posterDefaultName,
                    'small' => $posterSmallName,
                ];
            } elseif ($width >= 185) {
                $posterImgPathSmall = $posterImg->scale(185)->save(public_path('uploads/posters/' . $posterSmallName));

                $posterUrls = [
                    'small' => $posterSmallName,
                ];
            } else {
                return response()->json(['poster_custom' => ['Poster width must be at least 185px']], 422);
            }
        } else {
            if ($req->poster_type === 'url') {
                $posterUrls = [
                    'default' => $req->default_poster_url,
                    'large' => $req->large_poster_url,
                    'small' => $req->small_poster_url,
                ];
            }
        }

        // Update backdrop URLs
        $backdropUrls = [];
        if ($req->backdrop_type === 'custom' && $req->hasFile('backdrop_custom')) {
            $backdropCustom = $req->file('backdrop_custom');
            $backdropExt = $backdropCustom->getClientOriginalExtension();

            $backdropImg = Image::read($backdropCustom);
            $width = $backdropImg->width();

            $backdropLargeName = $this->randomNames($backdropExt);
            $backdropSmallName = $this->randomNames($backdropExt);

            if ($width >= 1280) {
                $backdropImgPathLarge = $backdropCustom->move(public_path('uploads/backdrops/'), $backdropLargeName);

                if ($width > 1280) {
                    $backdropImgPathSmall = $backdropImg->scale(1280)->save(public_path('uploads/backdrops/' . $backdropSmallName));

                    $backdropUrls = [
                        'large' => basename($backdropImgPathLarge),
                        'small' => $backdropSmallName,
                    ];
                } else {
                    $backdropUrls = [
                        'large' => basename($backdropImgPathLarge)
                    ];
                }
            } else {
                return response()->json(['backdrop_custom' => ['Backdrop width must be at least 1280px']], 422);
            }
        } else {
            if ($req->backdrop_type === 'url') {
                $backdropUrls = [
                    'large' => $req->large_backdrop_url,
                    'small' => $req->small_backdrop_url,
                ];
            }
        }

        $post->posters = json_encode(['type' => $validatedData['poster_type'], 'img' => $posterUrls]);
        $post->backdrops = json_encode(['type' => $validatedData['backdrop_type'], 'img' => $backdropUrls]);

        // Save the post
        $post->save();

        // Sync genres and categories
        $post->genres()->sync($validatedData['genre']);
        $post->categories()->sync($validatedData['category']);

        return response()->json(['msg' => 'Post updated successfully']);
    }

    public function selectEdit(Request $req)
    {
        $query = Post::query();

        if ($req->filled('search')) {
            $search = $req->input('search');
            $query->where('title', 'LIKE', "{$search}%");
        }

        if ($req->filled('filter')) {
            $filter = $req->input('filter');

            $publishArr = ['published', 'not_published'];

            if (in_array($filter, $publishArr)) {
                if ($filter == 'published') {
                    $query->where('publish', 1);
                } else {
                    $query->where('publish', 0);
                }
            } else {

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
        }

        $posts = $query->paginate(20);

        if ($req->ajax()) {
            $filteredPost = view('components.filtered-edit-post', ['posts' => $posts])->render();
            return response()->json(['html' => $filteredPost]);
        }

        return view('admin.post.selectEdit', ['posts' => $posts]);
    }


    public function handleCreate(Request $req)
    {
        $rules = [
            'imdb_id' => 'nullable|string',
            'tmdb_id' => 'nullable|string',
            'mal_id' => 'nullable|string',

            'publish' => 'required|boolean',
            'title' => 'required|string|unique:posts,title',
            'slug' => 'nullable|string|unique:posts,slug|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
            'type' => 'required|string',
            'isAnime' => 'required|boolean',
            'synopsis' => 'required|string',
            'ratingType' => 'required|string',
            'rating' => 'required|numeric|between:0,10',
            'releaseDate' => 'required|date_format:Y-m-d',
            'location' => 'required|string',

            'genre' => 'required|array',
            'genre.*' => 'integer|exists:genre,id',
            'category' => 'required|array',
            'category.*' => 'integer|exists:category,id',

            'poster_type' => 'required|string|in:url,custom',

            'default_poster_url' => 'required_if:poster_type,url',
            'default_poster_url' => 'nullable|url',

            'large_poster_url' => 'nullable|url',
            'small_poster_url' => 'nullable|url',
            'poster_custom' => 'required_if:poster_type,custom|nullable|file|image|max:2048',

            'backdrop_type' => 'required|string|in:url,custom',
            'large_backdrop_url' => 'required_if:backdrop_type,url',
            'large_backdrop_url' => 'nullable|url',
            'small_backdrop_url' => 'nullable|url',
            'backdrop_custom' => 'required_if:backdrop_type,custom|nullable|file|image|max:4096',

        ];

        // Define custom field names
        $customAttributes = [
            'publish' => 'Publish',
            'title' => 'Title',
            'slug' => 'Slug',
            'type' => 'Type',
            'isAnime' => 'Is Anime',
            'synopsis' => 'Synopsis',
            'ratingType' => 'Rating Type',
            'rating' => 'Rating',
            'releaseDate' => 'Release Date',
            'location' => 'Location',
            'genre' => 'Genre',
            'genre.*' => 'Genre',
            'category' => 'Category',
            'category.*' => 'Category',
            'poster_type' => 'Poster Type',
            'default_poster_url' => 'Default Poster URL',
            'large_poster_url' => 'Large Poster URL',
            'small_poster_url' => 'Small Poster URL',
            'poster_custom' => 'Poster Custom',
            'backdrop_type' => 'Backdrop Type',
            'large_backdrop_url' => 'Large Backdrop URL',
            'small_backdrop_url' => 'Small Backdrop URL',
            'backdrop_custom' => 'Backdrop Custom',
        ];


        // return  $req->poster_custom->resize(500, null, function ($constraint) {
        //     $constraint->aspectRatio();
        // });


        // Create a validator instance with rules and custom attributes
        $validator = Validator::make($req->all(), $rules);
        $validator->setAttributeNames($customAttributes); // Set custom field names

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Get validated data
        $validatedData = $validator->validated();


        // Checking Directories
        $postersDirectory = public_path('uploads/posters');
        $backdropsDirectory = public_path('uploads/backdrops');

        // Ensure the directories exist, create them if not
        if (!File::exists($postersDirectory)) {
            File::makeDirectory($postersDirectory, 0755, true, true);
        }

        if (!File::exists($backdropsDirectory)) {
            File::makeDirectory($backdropsDirectory, 0755, true, true);
        }


        $posterUrls = [];
        if ($req->poster_type === 'custom' && $req->hasFile('poster_custom')) {

            $posterCustom = $req->file('poster_custom');
            $posterExt = $posterCustom->getClientOriginalExtension();

            $posterImg = Image::read($posterCustom);
            $width = $posterImg->width();

            $posterLargeName = $this->randomNames($posterExt);
            $posterDefaultName = $this->randomNames($posterExt);
            $posterSmallName = $this->randomNames($posterExt);


            if ($width >= 500) {
                $posterImgPathLarge = $posterImg->scale(500)->save(public_path('uploads/posters/' . $posterLargeName));
                $posterImgPathDefault = $posterImg->scale(342)->save(public_path('uploads/posters/' . $posterDefaultName));
                $posterImgPathSmall = $posterImg->scale(185)->save(public_path('uploads/posters/' . $posterSmallName));

                $posterUrls = [
                    'large' => $posterLargeName,
                    'default' => $posterDefaultName,
                    'small' => $posterSmallName,
                ];
            } elseif ($width >= 342) {

                $posterImgPathDefault = $posterImg->scale(342)->save(public_path('uploads/posters/' . $posterDefaultName));
                $posterImgPathSmall = $posterImg->scale(185)->save(public_path('uploads/posters/' . $posterSmallName));

                $posterUrls = [
                    'default' => $posterDefaultName,
                    'small' => $posterSmallName,
                ];
            } elseif ($width >= 185) {
                $posterImgPathSmall = $posterImg->scale(185)->save(public_path('uploads/posters/' . $posterSmallName));

                $posterUrls = [
                    'small' => $posterSmallName,
                ];
            } else {
                return response()->json(['poster_custom' => ['Poster width must be at least 185px']], 422);
            }
        } else {
            $posterUrls = [
                'default' => $req->default_poster_url,
                'large' => $req->large_poster_url,
                'small' => $req->small_poster_url,
            ];
        }


        // Backdrop Image
        $backdropUrls = [];
        if ($req->backdrop_type === 'custom' && $req->hasFile('backdrop_custom')) {

            $backdropCustom = $req->file('backdrop_custom');
            $backdropExt = $backdropCustom->getClientOriginalExtension();

            $backdropImg = Image::read($req->file('backdrop_custom'));
            $width = $backdropImg->width();

            $backdropLargeName = $this->randomNames($backdropExt);
            $backdropSmallName = $this->randomNames($backdropExt);

            if ($width >= 1280) {

                $backdropImgPathLarge = $backdropCustom->move(public_path('uploads/backdrops/'), $backdropLargeName);

                if ($width > 1280) {
                    // Name Generated
                    $backdropImgPathSmall = $backdropImg->scale(1280)->save(public_path('uploads/backdrops/' . $backdropSmallName));

                    $backdropUrls = [
                        'large' => basename($backdropImgPathLarge),
                        'small' => $backdropSmallName,
                    ];
                } else {
                    $backdropUrls = [
                        'large' => basename($backdropImgPathLarge)
                    ];
                }
            } else {
                return response()->json(['backdrop_custom' => ['Backdrop width must be at least 1280px']], 422);
            }
        } else {
            $backdropUrls = [
                'large' => $req->large_backdrop_url,
                'small' => $req->small_backdrop_url,
            ];
        }

        if (!isset($validatedData['slug']) || strlen($validatedData['slug']) === 0) {
            $validatedData['slug'] = Str::slug($validatedData['title']);
        }

        // $formattedDate = Carbon::createFromFormat('Y-m-d', '2016-11-28')->format('Y-d-m');

        // Save the post
        $post = new Post();
        $post->publish = $validatedData['publish'];

        $post->imdb_id = $validatedData['imdb_id'];
        $post->tmdb_id = $validatedData['tmdb_id'];
        $post->mal_id = $validatedData['mal_id'];

        $post->title = $validatedData['title'];
        $post->slug = $validatedData['slug'];
        $post->type = $validatedData['type'];
        $post->is_anime = $validatedData['isAnime'];
        $post->synopsis = $validatedData['synopsis'];
        $post->rating_type = $validatedData['ratingType'];
        $post->rating = $validatedData['rating'];
        $post->release_date = $validatedData['releaseDate'];
        $post->location = $validatedData['location'];

        // $post->posters = json_encode($posterUrls);
        // $post->backdrops = json_encode($backdropUrls);
        $post->posters = json_encode(['type' => $validatedData['poster_type'], 'img' => $posterUrls]);
        $post->backdrops = json_encode(['type' => $validatedData['backdrop_type'], 'img' => $backdropUrls]);

        // Save genres and categories as JSON
        $post->genres = json_encode($validatedData['genre']);
        $post->categories = json_encode($validatedData['category']);

        $post->save();

        // Sync genres and categories
        $post->genres()->sync($validatedData['genre']);
        $post->categories()->sync($validatedData['category']);


        $createdAt = Carbon::parse($post->created_at)->tz('Asia/Dhaka');
        $releaseDate = Carbon::parse($post->release_date)->tz('Asia/Dhaka');



        $id = $post->id;
        $published = $post->publish;
        $title = $post->title;
        $slug = $post->slug;
        $backdrops = $post->backdrops;

        $createdAt = $createdAt->format('d F Y');


        $releaseDate = [
            'year' => $releaseDate->year,
            'month' => $releaseDate->month,
            'day' => $releaseDate->day,
            'hour' => $releaseDate->hour,
            'min' => $releaseDate->minute,
            'sec' => $releaseDate->second,
        ];



        return response()->json([
            'success' =>  true,
            'msg' => 'Post created successfully',
            'post' => [
                'id' => $id,
                'published' => $published,
                'title' => $title,
                'slug' => $slug,
                'backdrops' => json_decode($backdrops),
                'release_date' => $releaseDate,
                'created_at' => $createdAt
            ]
        ]);
    }

    public function randomNames($ext = '')
    {
        return uniqid() . Str::random(20) . '.' . $ext;
    }

    public function checkName(Request $req)
    {

        if ($req->has('post')) {
            $post = $req->query('post');

            if ($req->has('without')) {
                $withoutPost = $req->query('without');
                $getPost = Post::where('title', $post)->whereNot('title', $withoutPost)->get();
            } else {
                $getPost = Post::where('title', $post)->get();
            }

            if ($getPost->isEmpty()) {
                return response()->json(['found' => false]);
            } else {
                return response()->json(['found' => true]);
            }
        } else {
            $postsString = $req->query('posts');
            // $postsString = str_replace('"', '', $postsString);
            $postsNames = explode(',', $postsString);

            $getPosts = Post::whereIn('title', $postsNames)->get(['id', 'title']);

            if ($getPosts) {
                return response()->json(['success' => true, 'posts' => $getPosts]);
            }
            return response()->json(['success' => false, 'msg' => 'Post(s) not found!']);
        }
    }
    public function checkSlug(Request $req)
    {
        if ($req->has('slug')) {
            $slug = $req->query('slug');

            if (!empty($slug)) {

                if ($req->has('without')) {
                    $withoutSlug = $req->query('without');
                    $getPost = Post::where('slug', $slug)->whereNot('slug', $withoutSlug)->get();
                } else {
                    $getPost = Post::where('slug', $slug)->get();
                }

                if ($getPost->isEmpty()) {
                    return response()->json(['found' => false]);
                } else {
                    return response()->json(['found' => true]);
                }
            }
        } else {
            abort(404);
        }
    }

    public function deletePosts(Request $request)
    {

        if ($request->has('posts')) {
            // Handle Multiple Posts
            $postsString = urldecode($request->query('posts'));
            $postSlugs = explode('|', $postsString); // Change delimiter to pipe character

            // Fetch posts from the database
            $getPosts = Post::whereIn('slug', $postSlugs)->get(['slug']);

            $foundPostSlugs = $getPosts->pluck('slug')->map(function ($slug) {
                return strtolower(trim($slug));
            })->toArray();

            $missingPostSlugs = [];

            foreach ($postSlugs as $slug) {
                $normalizedSlug = strtolower(trim($slug));
                if (!in_array($normalizedSlug, $foundPostSlugs)) {
                    $missingPostSlugs[] = $normalizedSlug;
                }
            }



            // Determine the response status
            $status = !empty($missingPostSlugs) ? 404 : 200;

            if ($missingPostSlugs) {
                $response = [
                    'missing' => $missingPostSlugs
                ];

                return response()->json($response, $status);
            } else {
                $deletedRows = Post::whereIn('slug', $postSlugs)->delete();
                return response()->json([
                    'msg' => 'Deleted Successfully'
                ]);
            }
        } else {
            return response()->json([
                'msg' => '"posts" parameter not found (javacript error).'
            ], 400);
        }
    }
}
