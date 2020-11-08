<?php

namespace App\Jobs;

use App\Http\Controllers\NewsParser\NewsParserController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewsParsing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $url;

    /**
     * Create a new job instance.
     *
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @param NewsParserController $newsParser
     * @return void
     */
    public function handle(NewsParserController $newsParser)
    {
        $newsParser->parseUrl($this->url);
    }
}
