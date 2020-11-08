<?php

namespace App\Http\Controllers\NewsParser;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;

class ParserController extends Controller
{
    private $urlForPars = [
        'https://ria.ru/export/rss2/archive/index.xml',
        'https://www.fontanka.ru/fontanka.rss',
        'https://lenta.ru/rss',
    ];

    public function index()
    {
        foreach ($this->urlForPars as $url)
        {
            NewsParsing::dispatch($url);
        }
        return redirect()->route('admin.index');
    }
}
