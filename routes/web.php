<?php

use Doctrine\DBAL\Types\StringType;
use Illuminate\Support\Facades\Route;

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

//Страница о проекте
Route::get('/about/', static function () {
    echo "Информация о проекте(для красоты добавил информацию php)" . PHP_EOL;
    return phpinfo();
});

//Страница с выводом новостей по номеру(плавающая точка поддерживается)
Route::get('/news/{post}', static function (string $post) {
    if(preg_match("/[^\d,.]/",$post)){
    return "Oops, post not found";
    }else {
        echo "Wow, new post " . $post;
    }
});