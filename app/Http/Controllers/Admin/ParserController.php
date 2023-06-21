<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\ParserInterface;
use App\Services\ParserService;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ParserInterface $parser)
    {
        $load = $parser->setLink('https://news.rambler.ru/rss/starlife/')
            ->getParseData();

        dd($load);
    }
}
