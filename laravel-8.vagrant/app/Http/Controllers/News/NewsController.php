<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News\Category;
use App\Models\News\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.category')->with('news', Category::getCategories());
    }

    public function onePost($id)
    {
        return view('news.post')->with('news', News::getNewsId($id));
    }
}
