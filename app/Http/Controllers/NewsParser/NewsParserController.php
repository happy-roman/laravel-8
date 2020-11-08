<?php

namespace App\Http\Controllers\NewsParser;

use App\Http\Controllers\Controller;
use App\Models\News\Category;
use App\Models\News\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class NewsParserController extends Controller
{
    public function parseUrl($url)
    {
        $data = XmlParser::load($url)
            ->parse([
                'title' => ['uses' => 'channel.title'],
                'link' => ['uses' => 'channel.link'],
                'description' => ['uses' => 'channel.description'],
                'news' => ['uses' => 'channel.item[title,link,comments,pubDate,category,guid,description,enclosure::url]'],
            ]);

        foreach ($data['news'] as $news)
        {
            if($news['category']){
                $categoryName = $news['category'];
            } else {
                $categoryName = $data['title'];
            }
            $category = Category::query()->firstOrCreate([
                'slug' => Str::slug($categoryName),
                'title'=>$categoryName]);
            News::query()->firstOrCreate([
                'title' => $news['title'],
                'description' => $news['description'],
                'isPrivate' => false,
                'image' => $news['enclosure::url'],
                'link' => $news['link'],
                'category_id' => $category->id,
            ]);
        }
    }
}
