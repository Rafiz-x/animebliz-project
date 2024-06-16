<?php

use Illuminate\Support\Facades\Route;


// Controllers

use App\Http\Controllers\PageController;

use App\Http\Controllers\Auth\AdminLogin;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Api\ImdbAPI;
use App\Http\Controllers\Api\TmdbAPI;
//Middlewares 
use App\Http\Middleware\AppDetails;
use App\Http\Middleware\EnsureAdmin;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

Route::controller(PageController::class)->group(function () {
    Route::get('/{slug}', 'post')->name('post');

    Route::get('/', 'home')->name('home');
    Route::get('/trending', 'trending')->name('trending');
    Route::get('/genre/{slug}', 'genre')->name('genre');
    Route::get('/category/{slug}/', 'category')->name('category');
    Route::get('/mylist', 'myList')->name('myList');
    Route::get('/search', 'search')->name('search');
});


// Login Related


Route::controller(AdminLogin::class)->group(function () {
    Route::get('/admin/login', 'showForm')->name('admin.login');
    Route::get('/admin/logout', 'logout')->name('admin.logout');
    Route::post('/admin/login', 'login'); // For  Ajax Submit
});



Route::prefix('/admin')->middleware([EnsureAdmin::class, AppDetails::class])->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    });

    Route::controller(PostController::class)->group(function () {

        Route::get('/check', 'checkTitle');
        Route::get('/checkSlug', 'checkSlug');

        Route::get('/post', 'all')->name('post.all');

        Route::get('/post/create', 'create')->name('post.create');
        Route::post('/post/create', 'handleCreate')->name('post.create.handle');

        Route::get('/post/edit/', 'edit')->name('post.edit');
        Route::get('/post/edit/{slug}', 'edit')->name('post.edit.withSlug');

        Route::get('/post/delete', 'deletePosts')->name('post.delete');
    });

    Route::prefix('/category')->controller(CategoryController::class)->group(function () {
        Route::get('/check', 'checkCategories');
    });

    //GENRE

    Route::prefix('/genre')->controller(GenreController::class)->group(function () {
        Route::get('/check', 'checkGenres');
        Route::get('/checkSlug', 'checkSlug');

        Route::get('/', 'all')->name('admin.genre.all');

        Route::get('/create', 'create')->name('admin.genre.create');
        Route::post('/create', 'handleCreate')->name('admin.genre.create.handle');


        Route::get('/edit', 'selectEdit')->name('admin.genre.edit');
        Route::get('/edit/{slug}', 'edit')->name('admin.genre.edit.withSlug');
        Route::post('/edit', 'handleEdit')->name('admin.genre.edit.handle');

        Route::get('/delete', 'deleteGenres')->name('admin.genre.delete');
    });

    Route::prefix('/category')->controller(CategoryController::class)->group(function () {
        Route::get('/check', 'checkCategories');
        Route::get('/checkSlug', 'checkSlug');

        Route::get('/', 'all')->name('admin.category.all');

        Route::get('/create', 'create')->name('admin.category.create');
        Route::post('/create', 'handleCreate')->name('admin.category.create.handle');


        Route::get('/edit', 'selectEdit')->name('admin.category.edit');
        Route::get('/edit/{slug}', 'edit')->name('admin.category.edit.withSlug');
        Route::post('/edit', 'handleEdit')->name('admin.category.edit.handle');

        Route::get('/delete', 'deleteCategories')->name('admin.category.delete');
    });

    Route::controller(AdminController::class)->group(function () {
        Route::get('/profile', 'showProfile')->name('admin.profile');
    });
});

Route::prefix('/api')->middleware(EnsureAdmin::class)->group(function () {
    Route::get('/tmdb/{type}/{id}', [TmdbAPI::class, 'getResponse']);

    Route::get('/imdb/{id}', [ImdbAPI::class, 'scrapeData']); // This is a scraper not an api
    Route::get('/imdb/check/{id}', [ImdbAPI::class, 'check']); // Checking if url is valid
});

Route::get('/test/{name}', function ($name) {
    // Delete all files in /public/uploads/backdrops
    // File::cleanDirectory(public_path('uploads/backdrops'));

    // Delete all files in /public/uploads/posters
    // File::cleanDirectory(public_path('uploads/posters'));

    // $check = Category::where('name', '=', $name)->get();
    // if ($check->first() && $check->first()->id) {
    //     return 'Category ' . $name . ' Already Exist!';
    // }

    // $category = new Category;
    // $category->name = $name;
    // $category->slug = Str::slug($category->name);
    // $category->save();

    // return 'Category ' . $category->name . ' Created Successfully';
});