<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalGenre =  Genre::count();
        $totalCategory =  Category::count();
        $totalPost =  Post::count();

        return view('admin.other.dashboard', compact('totalGenre', 'totalCategory', 'totalPost'));
    }
}
