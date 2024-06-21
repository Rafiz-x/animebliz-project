<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Genre;
use App\Models\Post;
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
        $genres = Genre::all();
        $categories = Category::all();

        // Share the data with all views
        view()->share('genres', $genres);
        view()->share('categories', $categories);
    }


    public function home()
    {
        return view('home.home', ['APP_NAME' => $this->app_name]);
    }
    public function search()
    {
        return view('home.search', ['APP_NAME' => $this->app_name]);
    }
    public function trending()
    {
        return view('home.trending', ['APP_NAME' => $this->app_name]);
    }
    public function myList()
    {
        return view('home.mylist', ['APP_NAME' => $this->app_name]);
    }

    public function post($slug)
    {
        return view('home.post', ['APP_NAME' => $this->app_name, 'slug' => $slug]);
    }
    public function genre($slug)
    {
        $APP_NAME = $this->app_name;
        $genre = Genre::where('slug', $slug)->firstOrFail();
        $genreId = $genre->id;
        $postIds = PostGenre::where('genre_id', $genreId)->pluck('post_id')->toArray();
        $posts = Post::whereIn('id', $postIds)->get();

        return view('home.genre', ['APP_NAME' => $this->app_name, 'posts' => $posts], compact('APP_NAME', 'posts', 'genre'));
    }
    public function category($slug)
    {
        return view('home.category', ['APP_NAME' => $this->app_name, 'slug' => $slug]);
    }
}
