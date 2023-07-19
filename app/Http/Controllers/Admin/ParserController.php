<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use App\Services\Contracts\ParserInterface;
use App\Services\ParserService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public ParserService $parser;

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ParserInterface $parser): View|Application|Factory
    {
        $urls = [
            'https://news.rambler.ru/rss/starlife',
            'https://news.rambler.ru/rss/world',
            'https://news.rambler.ru/rss/politics',
            'https://news.rambler.ru/rss/incidents',
            'https://news.rambler.ru/rss/tech',
            'https://news.rambler.ru/rss/Moscow',
            'https://news.rambler.ru/rss/Yaroslavl',
        ];

        //Диспетчер очередей
        foreach ($urls as $url) {
            \dispatch(new JobNewsParsing($url));
        }

        return $parser->getParseData();
    }
}
