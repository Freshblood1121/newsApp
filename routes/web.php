<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Страница приветствия пользователей
Route::get('/', static function () {
    return "Welcome users!";
});

//Админка
Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function () {
    //Страница админки
    Route::get('/', AdminController::class)
        ->name('index');
    //Страница категорий
    Route::resource('category', AdminCategoryController::class);
    //Страница новостей
    Route::resource('news', AdminNewsController::class);
});
//Новости
Route::group(['prefix' => 'guest'], static function () {
    //Страница с выводом новостей
    Route::get('/news', [NewsController::class, 'index'])
        ->name('news');
    //Страница с выводом одной новости на выбор
    Route::get('/news/{id}/show', [NewsController::class, 'show'])
        ->where('id', '\d+')
        ->name('news.show');
    //Страница с выводом сохранённых новостей
    Route::get('/news/category/{id}', [NewsController::class, 'categorySavePosts'])
        ->where('id', '\d+')
        ->name('news.savePosts');
    //Страница с выводом сохранённых категорий
    Route::get('/news/category', [NewsController::class, 'saveCategory'])
        ->name('news.saveCategory');
});
