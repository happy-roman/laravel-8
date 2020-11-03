<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News\Category;
use App\Models\News\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index() {

        $news = News::all();

        return view('admin.news.news-all')->with('news', $news);
    }

    public function create(Request $request, News $news) {

        if ($request->isMethod('post')) {
            $url = null;
            if ($request->file('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
            }

            $news->image = $url;
            $news->fill($request->except('image', '_token'))->save();

            return redirect()->route('news.category.post', $news->id)->with('success', 'Новость добавлена!');
        }
        return view('admin.news.create-news', [
            'categories' => Category::all(),
            'news' => $news
        ]);
    }

    public function destroy(News $news) {
        $news->delete();
        return redirect()->route('admin.users')->with('success', 'Новость успешно удалена');
    }

    public function edit(News $news) {
        return view('admin.news.create-news', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, News $news) {
        $url = null;
        if ($request->file('image')) {
            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);
        }
        if (!$request->isPrivate){
            $news->isPrivate = false;
        }
        $request->category_id = (int)$request->category_id;
        $news->image = $url;
        $news->fill($request->except('image'))->save();

        return redirect()->route('news.category.post', $news->id)->with('success', 'Новость изменена!');
    }
}
