<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
use App\Models\News;
use App\QueryBuilders\CategoryQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Enum;
use Mockery\Exception;

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
            [
                'newsList' => $newsQueryBuilder->getNewsWithPagination(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param CategoryQueryBuilder $categoryQueryBuilder
     * @return View
     */
    public function create(CategoryQueryBuilder $categoryQueryBuilder, News $news): View
    {   //Категории
        return \view('admin.news.create',
            [
                'news' => $news,
                'categories' => $categoryQueryBuilder->getAll(),
                'statuses' => NewsStatus::all(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $news = News::create($request->validated()); //News::create()

        if($news->save()) {
            $news->categories()->attach($request->getCategoryIds());
          return redirect()->route('admin.news.index')->with('success',__('messages.admin.news.create.success'));
        }
        return back()->with('error', __('messages.admin.news.create.fail'));
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
     * @param EditRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(EditRequest $request, News $news): RedirectResponse
    {
        $news = $news->fill($request->validated());

        if($news->save()) {
            $news->categories()->sync($request->getCategoryIds());
            return redirect()->route('admin.news.index')->with('success', __('messages.admin.news.update.success'));
        }
        return back()->with('error', __('messages.admin.news.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     * @param News $news
     */
    public function destroy(News $news): JsonResponse
    {
        try {
            $news->delete();
            return response()->json('ok');
        } catch (Exception $exception) {
            Log::error($exception->getMessage(), [$exception]);
            return response()->json('error', 400);
        }
    }
}
