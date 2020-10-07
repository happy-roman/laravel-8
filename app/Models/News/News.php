<?php

namespace App\Models\News;

use Illuminate\Support\Facades\File;

class News
{
    public static function getNewsByCategory($slug) {
        $id = Category::getCategoryIdBySlug($slug);
        $allNews = News::getNews();
        $news = [];
        foreach ($allNews as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }

    public static function getNews()
    {
        return json_decode( File::get(storage_path() . '/news.json' ), true);
    }

    public static function getNewsId($id)
    {
        $allNews = News::getNews();
        if (array_key_exists($id, $allNews))
            return $allNews[$id];
        else
            return [];
    }
}
