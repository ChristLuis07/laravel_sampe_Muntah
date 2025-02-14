<?php

use App\Helpers\PexelsHelper;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;











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

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');
Route::get('/posts/autocomplete', [PostController::class, 'autocomplete'])->name('posts.autocomplete');
Route::post('/posts/{post}/react', [ReactionController::class, 'react'])->middleware('auth');
Route::get('/posts/{post:slug}', [PostController::class, 'tampilkan']);


Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store'])->middleware('auth');


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/test-helper', function () {
    return PexelsHelper::getGambarUrl('programming');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');


Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('admin');

Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store'])
    ->middleware('auth')
    ->name('comments.store');

Route::post('/contact', [MessageController::class, 'store'])->name('contact.store');

Route::get('/authors', [AuthorController::class, 'index'])->name('author.index');
Route::get('/authors/{author:username}', [AuthorController::class, 'show'])->name('author.show');

Route::get('/news', [NewsController::class, 'index']);

Route::get('dashboard/analytics', [AnalyticsController::class, 'index'])
    ->name('dashboard.analytics')
    ->middleware('admin');
