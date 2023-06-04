<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatus;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\QueryBuilders\CategoryQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param NewsQueryBuilder $newsQueryBuilder
     * @return View
     */
    public function index(NewsQueryBuilder $newsQueryBuilder): View
    {   //Новости
        return \view('admin.news.index',
            ['newsList' => $newsQueryBuilder->getAll()]);
    }

    /**
     * Show the form for creating a new resource.
     * @param CategoryQueryBuilder $categoryQueryBuilder
     * @return View
     */
    public function create(CategoryQueryBuilder $categoryQueryBuilder,): View
    {   //Категории
        return \view('admin.news.create',
            [
                'categories' => $categoryQueryBuilder->getAll(),
                'statuses' => NewsStatus::all(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $news = new News($request->except('_token')); //News::create()
        if($news->save()) {
          return redirect()->route('admin.news.index')->with('success','Новость успешно добавлена!');
        }
        return back()->with('error', 'Не удалось добавить новость.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param News $news
     * @param CategoryQueryBuilder $categoryQueryBuilder
     * @return View
     */
    public function edit(News $news, CategoryQueryBuilder $categoryQueryBuilder): View
    {
        return \view('admin.news.edit',
            [
                'news' => $news,
                'categories' => $categoryQueryBuilder->getAll(),
                'statuses' => NewsStatus::all(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(Request $request, News $news): RedirectResponse
    {
        $news = $news->fill($request->except('_token'));
        if($news->save()) {
            return redirect()->route('admin.news.index')->with('success','Новость успешно обновлена!');
        }
        return back()->with('error', 'Не удалось сохранить запись.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
