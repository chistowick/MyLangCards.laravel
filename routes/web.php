<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Маршрут к стартовой странице
Route::get('/', function(){
    return view('layouts.main');
});

// Маршрут для получения списка всех доступных пользователю карточек
Route::post('ajax/get-cards', 'AjaxController@getCards');

// Маршрут для обработки запроса на добавление новой карточки
Route::post('ajax/add-card', 'AjaxController@addCard');

// Маршрут для обработки запроса на редактирование карточки
Route::post('ajax/edit-card', 'AjaxController@editCard');

// Маршрут для обработки запроса на удаление карточки
Route::post('ajax/delete-card', 'AjaxController@deleteCard');

// Маршрут для обработки запроса на перемещение карточки
Route::post('ajax/move-card', 'AjaxController@moveCard');

// Группа маршрутов для аутентификации
Auth::routes();

// Маршрут, который загружается HomeController'ом, в тот момент когда пользователь авторизовался
Route::get('/home', 'HomeController@index')->name('home');
