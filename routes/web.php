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
Route::get('/suscribete', function () {
    return view('home/subscripcion');
});

Route::post('/mensaje', 'Clientes@mail');

//Route::resource('/noticias', 'Noticias');

Auth::routes();
Route::resource('/noticias', 'Noticias');
Route::get('/admin/noticias/list', 'Noticias@lista')->middleware('auth');
Route::get('admin/noticias/destroy', 'Noticias@destroy');

Route::resource('/clientes', 'Clientes');
Route::get('/nacimiento', 'Clientes@establecerNacimiento');
Route::get('/edad', 'Clientes@verificarEdad');
Route::get('/clientesDestroy', 'Clientes@destroy');
Route::get('/prueba', 'Clientes@prueba');

Route::get('/admin', 'HomeController@index');
Route::get('/admin/noticias/list', 'Noticias@lista');




