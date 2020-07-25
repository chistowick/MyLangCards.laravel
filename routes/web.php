<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/', function () {
    return view('auth.login');
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
// Auth::routes();

// Кастомизированная группа маршрутов аутентификации, верификации и проч:

// Login Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login'); // Sign in
Route::post('login', 'Auth\LoginController@login')->name('login-post');

// Logout Routes...
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register'); // Sign up
Route::post('register', 'Auth\RegisterController@register')->name('register-post');

// // Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email'); // Отправка на email ссылки для сброса пароля
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset'); // Проверка токена и показ формы на reset пароля
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update'); // Обновить пароль

// (GET) Запрос пароля пользователя, перед тем как дать ему доступ к чему-то важному 
// (POST) - обработка ответа пользователя
// // Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
// // Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
// Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');









// Маршрут, который загружается HomeController'ом, в тот момент когда пользователь авторизовался
Route::get('/home', 'HomeController@index')->name('home');
