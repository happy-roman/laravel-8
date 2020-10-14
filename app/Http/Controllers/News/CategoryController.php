<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News\Category;
use App\Models\News\News;

class CategoryController extends Controller
{
    public function index() {
        return view('news.category', [
            'categories' => Category::all()
        ]);
    }

    public function show($slug) {
        $category = Category::query()->where('slug', $slug)->first();
        $news = News::query()->where('category_id', $category->id)->orderBy('created_at')->get();
        return view('news.category-news', [
            'news' => $news,
            'category' => $category
        ]);
    }
}
