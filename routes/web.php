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
// DB::listen(function($event)
// {
//     dump($event->sql);
// });

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/hello', function () {
    return view('latihan.index');
});

Route::resource('/cert', 'CertController');
Route::resource('/tboa', 'TboaController');
Route::resource('/rcert', 'Child2Controller');

Route::get('user', 'UserController@index')->name('user.index');
Route::post('/user/createrole', 'UserController@createrole')->name('user.createrole');

Route::get('/hellocontroller/{name}', 'LatihanController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
