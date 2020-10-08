<?php


namespace App\Models\News;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class Category
{
    public static function getCategoryNameBySlug($slug) {
        $id = Category::getCategoryIdBySlug($slug);
        $category = Category::getCategoryById($id);
        if ($category)
            return $category->title;
        else return [];
    }

    public static function getCategoryIdBySlug($slug) {
        $id = null;
        $categories = Category::getCategories();
        foreach ($categories as $item) {
            if ($item->slug == $slug) {
                $id = $item->id;
                break;
            }
        }
        return $id;
    }

    public static function getCategories()
    {
        return DB::table('categories')->get();
//        return json_decode( File::get(storage_path() . '/categories.json'),true);
    }

    public static function getCategoryById($id) {
        $categories = Category::getCategories();
        foreach ($categories as $item){
            if ($id == $item->id)
                return $item;
        }
        return [];
    }


}
