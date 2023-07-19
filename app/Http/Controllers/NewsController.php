<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::query()->paginate(6);
        return view('news.index',
            ['newsList' => $news]);
    }

    public function show(News $news): View
    {
        return \view('news.show',
            ['news' => $news]);
    }
}
