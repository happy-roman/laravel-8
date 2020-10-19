<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News\Category;
use App\Models\News\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class NewsController extends Controller
{
    public function index()
    {
        $categories = new Category();
        return view('news.category')->with('news', $categories);
    }
    public function all()
    {
//        $news = News::query()->paginate(10);
        $news = News::all();
        return view('news.all')->with('news', $news);
    }

    public function onePost(News $news)
    {
        return view('news.post')->with('news', $news);
    }
}
