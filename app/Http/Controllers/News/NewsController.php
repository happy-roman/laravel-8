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

    public function onePost(News $news)
    {
        return view('news.post')->with('news', $news);
    }
}
