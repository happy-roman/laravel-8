<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News\Category;
use App\Models\News\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Static_;


class AdminController extends Controller
{
    private static $newNews = [
        'id' => 0,
        'isPrivate' => false,
    ];
    public function index(){
        return view('admin.index');
    }

    public function create(Request $request) {



        if ($request->isMethod('post')) {
            $url = null;
            if ($request->file('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
            }

            $arr = array_merge(static::$newNews, $request->except('_token'));
            DB::table('news')->insert([
                'title' => $arr['title'],
                'text' => $arr['text'],
                'isPrivate' => $arr['isPrivate'],
                'category_id' => $arr['category_id'],
                'image' => $url
            ]);


//            $allNews = News::getNews();
//
//            $arr = array_merge(static::$newNews, $request->except('_token'));
//
//            array_push($allNews, $arr);
//
//            $id = array_key_last($allNews);
//
//            $allNews[$id]['id'] = $id;
//
//            File::put(storage_path() . '/news.json',
//                json_encode($allNews, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
//            $request->flash();
            return redirect()->route('admin.create')->with('success', 'Новость добавлена');
        }
        return view('admin.create-news', [
            'categories' => Category::getCategories()
        ]);
    }
}
