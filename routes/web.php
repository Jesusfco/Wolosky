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

Route::get('/', 'Noticias@home');
Route::get('/quienes', function () {
    return view('home/quienes');
});
Route::get('/equipo', function () {
    return view('home/equipo');
});
Route::get('/contacto', function () {
    return view('home/contacto');
});

//Route::resource('/noticias', 'Noticias');

Auth::routes();

Route::get('/admin', 'HomeController@index');

Route::get('/admin/noticias/list', 'Noticias@lista');

Route::get('/prueba', 'Noticias@prueba');

Route::resource('/noticias', 'Noticias');
Route::resource('/clientes', 'Clientes');

Route::get('/admin/noticias/list', 'Noticias@lista')->middleware('auth');

