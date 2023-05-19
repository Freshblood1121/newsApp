<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\View\Factory;

class NewsController extends Controller
{
    use NewsTrait, SaveNewsTrait, SaveCategoryTrait;
    public function index()
    {
        return view('news.index',
        [ 'news' => $this->getNews()]);
    }

    public function show(int $id)
    {
        dd($this->getNews($id));
    }

    public function saveCategory(): array
    {
        dd($this->getCategory());
    }

    public function categorySavePosts(int $id): array
    {
        dd($this->getPosts($id));
    }
}
