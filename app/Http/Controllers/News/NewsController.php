<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News\Category;
use App\Models\News\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('news.category')->with('news', $categories);
//        return view('news.category')->with('news', Category::getCategories());
    }

    public function onePost($id)
    {
        $news = DB::table('news')->find($id);
        return view('news.post')->with('news', $news);
//        return view('news.post')->with('news', News::getNewsId($id));
    }
}
