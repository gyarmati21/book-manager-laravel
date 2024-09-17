<?php

use Illuminate\Support\Facades\Route;

Route::get('/books', 'App\Http\Controllers\BookController@index');
Route::get('/books/create', 'App\Http\Controllers\BookController@create');
Route::post('/books/create', 'App\Http\Controllers\BookController@store');

Route::get('/', function () {
    return view('welcome');
});
