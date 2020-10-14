<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\News\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\News\NewsController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

/**
Группиовка роутов
 */
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
    ->namespace('Admin')
    ->group(
        function () {
            Route::get('/', [AdminController::class, 'index'])->name('index');
            Route::match(['get','post'],'/create', [AdminController::class, 'create'])->name('create');
            Route::match(['get','post'], '/edit/{news}', [AdminController::class, 'edit'])->name('edit');
            Route::match(['get','post'], '/delete/{news}', [AdminController::class, 'delete'])->name('delete');
            Route::match(['get','post'], '/update/{news}', [AdminController::class, 'update'])->name('update');

        }
    );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
