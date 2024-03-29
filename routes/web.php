<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SocialProvidersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Auth\LoginController as LogoutController;
use App\Http\Controllers\Admin\ParserController;

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
    return view('welcome');
});

Route::group(['middleware' => 'auth'], static function () {
    //Выход
    Route::get('/logout', [LogoutController::class, 'logout'])->name('account.logout');
    //Аккаунт
    Route::get('/account', AccountController::class)->name('account');
    //Админка
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is.admin'], static function () {
        //Страница админки
        Route::get('/', AdminController::class)
            ->name('index');
        Route::get('/parser', ParserController::class)
            ->name('parser');
        //Страница категорий
        Route::resource('category', AdminCategoryController::class);
        //Страница новостей
        Route::resource('news', AdminNewsController::class);
    });
});

//Новости
Route::group(['prefix' => 'guest',], static function () {
    //Страница с выводом новостей
    Route::get('/news', [NewsController::class, 'index'])
        ->name('news');
    //Страница с выводом одной новости на выбор
    Route::get('/news/{news}', [NewsController::class, 'show'])
        ->where('news', '\d+')
        ->name('news.show');
    //Страница с выводом сохранённых новостей
    Route::get('/news/category/{id}', [NewsController::class, 'categorySavePosts'])
        ->where('id', '\d+')
        ->name('news.savePosts');
    //Страница с выводом сохранённых категорий
    Route::get('/news/category', [NewsController::class, 'saveCategory'])
        ->name('news.saveCategory');
});

Route::get('session', function () {
    $sessionName = 'test';
    if (session()->has($sessionName)) {
        //dd(session()->get($sessionName), );
        session()->forget($sessionName);
    }
    dd(session()->all());
    //session()->put($sessionName, 'example');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'guest'], function() {
    Route::get('/auth/redirect/{driver}', [SocialProvidersController::class, 'redirect'])
        ->where('driver', '\w+')
        ->name('social.auth.redirect');

    Route::get('/auth/callback/{driver}', [SocialProvidersController::class, 'callback'])
        ->where('driver', '\w+');
});
