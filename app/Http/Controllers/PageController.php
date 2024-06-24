<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Genre;
use App\Models\Link;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostGenre;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public $app_name;
    public function __construct()
    {
        $settings = DB::table('settings')->find(1, ['app_name']);
        $this->app_name = $settings->app_name;

        // Fetch genres and categories
        $genres = Genre::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        // Share the data with all views
        view()->share('genres', $genres);
        view()->share('categories', $categories);
    }


    public function home()
    {
        $APP_NAME = $this->app_name;

        $genreIdsWithMinPosts = PostGenre::select('genre_id')
            ->groupBy('genre_id')
            ->having(DB::raw('COUNT(*)'), '>=', 3)
            ->pluck('genre_id');

        // Step 2: Retrieve genres with their associated posts
        $sections = Genre::whereIn('id', $genreIdsWithMinPosts)
            ->with(['posts' => function ($query) {
                $query->take(20);
            }])
            ->orderBy('name', 'asc')
            ->get();

        $headerPost = Post::where('publish', 1)->inRandomOrder()->orderBy('rating', 'desc')->first();
        // return $headerPost;

        return view('home.home', compact('APP_NAME', 'sections', 'headerPost'));
    }
    public function search($query)
    {
        $posts = Post::where('title', 'LIKE', "$query%")
            // ->orWhere('synopsis', 'LIKE', "$query%")
            ->paginate(20);

        $APP_NAME = $this->app_name;
        return view('home.search', compact('APP_NAME', 'query', 'posts'));
    }
    public function trending()
    {
        return view('home.trending', ['APP_NAME' => $this->app_name]);
    }
    public function myList()
    {
        $APP_NAME = $this->app_name;
        $notLogged = 1;
        return view('home.mylist', compact('APP_NAME', 'notLogged'));
    }

    public function post($slug)
    {
        $APP_NAME = $this->app_name;

        $post = Post::where('publish', 1)->where('slug', $slug)->get();
        if ($post->isEmpty()) {
            abort('404');
        }

        $post = $post->first();
        $postID = $post->id;

        $genreIDs = PostGenre::where('post_id', $postID)->pluck('genre_id')->toArray();
        $genres = Genre::whereIn('id', $genreIDs)->get();

        $links = Link::where('post_id', $postID)->get();

        return view('home.post', compact('APP_NAME', 'post', 'links'));
    }

    public function genre($slug)
    {
        $APP_NAME = $this->app_name;
        $genre = Genre::where('slug', $slug)->firstOrFail();
        $genreId = $genre->id;
        $postIds = PostGenre::where('genre_id', $genreId)->pluck('post_id')->toArray();
        $posts = Post::whereIn('id', $postIds)->where('publish', 1)->paginate(20);

        return view('home.genre', compact('APP_NAME', 'posts', 'genre'));
    }
    public function category($slug)
    {
        $APP_NAME = $this->app_name;
        $category = Category::where('slug', $slug)->firstOrFail();
        $categoryID = $category->id;
        $postIDs = PostCategory::where('category_id', $categoryID)->pluck('post_id')->toArray();
        $posts = Post::whereIn('id', $postIDs)->where('publish', 1)->paginate(20);

        return view('home.category',  compact('APP_NAME', 'posts', 'category'));
    }
}
