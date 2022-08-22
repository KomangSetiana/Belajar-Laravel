<?php

use App\Http\Controllers\AdminPostController;
use Illuminate\Support\Facades\Route;
use App\Models\post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DasboardPostController;
use App\Models\Category;
use App\Models\User;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "tittle" => "Home",
        "active" => "home"
    ]);
});

Route::get('/about', function () {
    return view(
        'about',
        [
            "tittle" => "About",
            'active' => 'about',
            "nama" => "I Komang Setiana",
            "email" => "komangsetiana40@gmai.com",
            "image" => "setiana.jpg"
        ]
    );
});



Route::get('/blog', [PostController::class, 'index']);

//halaman single post
Route::get('/posts{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'tittle' => 'Post by Category',
        'active' => 'category',
        'categories' => Category::all()

    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'tittle' => "Posts by Category :$category->name",
        'active' => 'categories',
        'posts' => $category->posts->load('category', 'author'),


    ]);
});


Route::get('/authors/{author:username}', function (USer $author) {
    return view('posts', [
        'tittle' => "Posts By Author : $author->name",
        'active' => 'author',
        'posts' => $author->posts->load('category', 'author')
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dasboard', function () {
    return view('dasboard.index');
})->middleware('auth');

Route::get('/dasboard/posts/checkSlug', [DasboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dasboard/posts', DasboardPostController::class)->middleware('auth');
Route::resource('/dasboard/categories', AdminPostController::class)->except('show')->middleware('admin');
