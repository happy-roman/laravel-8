<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.category');
    }

    public function category($name)
    {
        return view('news.category-news', ['name'=>$name]);
    }

    public function onePost($id)
    {
        return view('news.post', ['id'=> $id]);
    }
}
