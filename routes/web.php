<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\News\NewsController;
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
            Route::get('/', [NewsController::class, 'index'])->name('category');
            Route::name('category.')
                ->prefix('category')
                ->namespace('News')
                ->group(
                    function() {
                        Route::get('/{name}', [NewsController::class, 'category'])->name('name');
                        Route::get('/post/{id}', [NewsController::class, 'onePost'])->name('post');
                    }
                );
        }
    );


/**
второй способ групировки
 */
//Route::group([
//    'prefix' => 'news',
//    'namespace' => 'News',
//    'as' => 'news.'
//], function (){
//  Route::get('/', [NewsController::class, 'index'])->name('all');
//  Route::get('/{id}', [NewsController::class, 'onePost'])->name('one');
//});

/**
без группировки
 */
//Route::get('/news', [NewsController::class, 'index'])->name('news-all');
//Route::get('/news/{id}', [NewsController::class, 'onePost'])->name('news-one');

