<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News\Category;
use App\Models\News\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return view('news.category', [
            'categories' => Category::getCategories()
        ]);
    }

    public function show($slug) {
        return view('news.category-news', [
            'news' => News::getNewsByCategory($slug),
            'category' => Category::getCategoryNameBySlug($slug)
        ]);
    }
}
