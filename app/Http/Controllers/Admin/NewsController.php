<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $model = new News();
        //Получить все данные из базы
        $newsList = $model->getNews();
        //Получить данные из базы по ID
        //$newsList = $model->getNewsById();
        return \view('admin.news.index',
            ['newsList' => $newsList]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return \view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
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
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
