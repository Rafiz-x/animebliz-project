<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;

class AdminController extends Controller
{
    public function profile(){
        return view('admin.other.profile');
    }
    public function dashboard()
    {
        $totalGenre =  Genre::count();
        $totalCategory =  Category::count();
        $totalPost =  Post::count();

        return view('admin.other.dashboard', compact('totalGenre', 'totalCategory', 'totalPost'));
    }
}
