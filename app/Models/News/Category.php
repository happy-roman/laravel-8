<?php


namespace App\Models\News;


class Category
{
    private static $categories = [
        1 => [
            'id' => 1,
            'title' => 'Спорт',
            'slug' => 'sport'
        ],
        2 => [
            'id' => 2,
            'title' => 'Политика',
            'slug' => 'politics'
        ],
    ];

    public static function getCategoryNameBySlug($slug) {
        $id = Category::getCategoryIdBySlug($slug);
        $category = Category::getCategoryById($id);
        if ($category != [])
            return $category['title'];
        else return [];
    }

    public static function getCategoryIdBySlug($slug) {
        $id = null;
        foreach (static::$categories as $category) {
            if ($category['slug'] == $slug) {
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }

    public static function getCategories()
    {
        return static::$categories;
    }

    public static function getCategoryById($id) {
        if (array_key_exists($id, static::$categories))
            return static::$categories[$id];
        else
            return [];
    }

}
