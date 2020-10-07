<?php


namespace App\Models\News;


use Illuminate\Support\Facades\File;

class Category
{
    public static function getCategoryNameBySlug($slug) {
        $id = Category::getCategoryIdBySlug($slug);
        $category = Category::getCategoryById($id);
        if ($category != [])
            return $category['title'];
        else return [];
    }

    public static function getCategoryIdBySlug($slug) {
        $id = null;
        $categories = Category::getCategories();
        foreach ($categories as $category) {
            if ($category['slug'] == $slug) {
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }

    public static function getCategories()
    {
        return json_decode( File::get(storage_path() . '/categories.json'),true);
    }

    public static function getCategoryById($id) {
        $categories = Category::getCategories();
        if (array_key_exists($id, $categories))
            return $categories[$id];
        else
            return [];
    }


}
