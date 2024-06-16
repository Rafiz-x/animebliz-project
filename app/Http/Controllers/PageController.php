<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public $app_name;
    public function __construct()
    {
        $settings = DB::table('settings')->find(1, ['app_name']);
        $this->app_name = $settings->app_name;
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
        return view('home.genre', ['APP_NAME' => $this->app_name, 'slug' => $slug]);
    }
    public function category($slug)
    {
        return view('home.category', ['APP_NAME' => $this->app_name, 'slug' => $slug]);
    }
}
