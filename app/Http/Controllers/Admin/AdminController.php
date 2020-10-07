<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use phpDocumentor\Reflection\Types\Static_;


class AdminController extends Controller
{
    private static $newNews = [
        'id' => null,
        'isPrivate' => false,
    ];
    public function index(){
        return view('admin.index');
    }

    public function create(Request $request) {

        if ($request->isMethod('post')) {
            $arr = array_merge(static::$newNews, $request->all());

            $allNews = json_decode(
                File::get(storage_path() . '/news.json'),
                JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            $arr['id'] = count($allNews) + 1;
            array_push($allNews, $arr);
            File::put(storage_path() . '/news.json',
                json_encode($allNews, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            $request->flash();
            return redirect()->route('admin.create');
        }
        return view('admin.create-news', [
            'categories' => Category::getCategories()
        ]);
    }
}
