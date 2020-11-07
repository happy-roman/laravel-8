<?php

use App\Http\Controllers\NewsParser\ParserController;
use App\Http\Controllers\SocialLoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\News\CategoryController;
use App\Http\Controllers\News\NewsController;


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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::match(['get','post'],'/profile', [ProfileController::class, 'update'])->name('profile');

Route::get('/auth/vk', [SocialLoginController::class, 'loginVK'])->name('loginVk');
Route::get('/auth/vk/response', [SocialLoginController::class, 'responseVK'])->name('responseVk');

Route::get('/auth/ok', [SocialLoginController::class, 'loginOK'])->name('loginOK');
Route::get('/auth/ok/response', [SocialLoginController::class, 'responseOK'])->name('responseOK');

Route::get('/auth/git', [SocialLoginController::class, 'loginGit'])->name('loginGit');
Route::get('/auth/git/response', [SocialLoginController::class, 'responseGit'])->name('responseGit');


Route::name('news.')
    ->prefix('news')
    ->namespace('News')
    ->group(
        function() {
            Route::get('/', [CategoryController::class, 'index'])->name('category');
            Route::name('category.')
                ->prefix('category')
                ->namespace('News')
                ->group(
                    function() {
                        Route::get('/{slug}', [CategoryController::class, 'show'])->name('name');
                        Route::get('/post/{news}', [NewsController::class, 'onePost'])->name('post');
                    }
                );
        }
    );

Route::name('admin.')
    ->prefix('admin')
    ->namespace('App\Http\Controllers\Admin')
    ->middleware(['auth', 'is_admin'])
    ->group(
        function () {
            Route::get('/', [IndexController::class, 'index'])->name('index');
            Route::resource('/news', 'NewsController')->except(['show']);
            Route::get('/parse', [ParserController::class, 'index'])->name('news.parse');
            Route::get('/users', [UsersController::class, 'index'])->name('index');
            Route::resource('/users', 'UsersController')->except(['show', 'store']);

        }
    );

Auth::routes();
