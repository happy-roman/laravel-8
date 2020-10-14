<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News\Category;
use App\Models\News\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
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
        return view('admin.create-news', [
            'categories' => Category::all(),
            'news' => $news
        ]);
    }

    public function delete(News $news) {
        $news->delete();
        return redirect()->route('admin.index')->with('success', 'Новость успешно удалена');
    }

    public function edit(News $news) {
        return view('admin.create-news', [
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

        $news->image = $url;
        $news->fill($request->except('image'))->save();

        return redirect()->route('news.category.post', $news->id)->with('success', 'Новость изменена!');
    }
}
