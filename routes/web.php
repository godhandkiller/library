<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Cree un middleware para que solo el admin pueda acceder a estas rutas
Route::middleware('admin')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('book', 'bookController');
    Route::get('/book/{book}/delete', 'BookController@delete')->name('book.delete');
    Route::post('/book/update', 'BookController@updateAvailability')->name('book.update.availability');
});