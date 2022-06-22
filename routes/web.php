<?php

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


Route::get('/', 'mailController@index')->middleware('auth');
Route::get('/mail', 'mailController@index');
Route::get('/posts/index', 'mailController@index');
//Hoomページ
Route::get('/mails/{mail}', 'mailController@show');
Route::get('/posts/create', 'mailController@create')->name("mail");
//追加・編集ページ
Route::get('/posts/school', 'mailController@school');
//学校連絡ページ

Route::get('/posts/guarudian', 'mailController@guardian');
//保護者連絡ページ

Route::get('/posts/calendar', 'mailController@calendar');
Route::post('/posts', 'mailController@store');

Route::get('/posts/{mail}/edit','mailController@edit');

//ブログ投稿編集画面表示　URI:/posts/{mail}/　リクエスト種別:GET　コントローラ:edit関数
Route::put('/mails/{mail}', 'mailController@update');
//ブログ投稿編集実行　URI:/posts/{mail}　リクエスト種別：PUT　コントローラ：mailController:update関数
Route::get('/posts/guardiancreate','mailController@create')->name("guardian");
Route::put('/posts/{mail}', 'mailController@delete');
//Route::get('/posts/{id}', 'mailController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/calendar', function(){
    return view('calendar');
});