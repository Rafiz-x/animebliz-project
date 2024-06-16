<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function all()
    {
        return view('admin.collection.all');
    }
    
    public function create()
    {
        return view('admin.collection.create');
    }

    public function edit()
    {
        return view('admin.collection.edit');
    }

    public function delete()
    {
        return view('admin.collection.delete');
    }
}
