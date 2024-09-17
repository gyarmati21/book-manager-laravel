<?php

use Illuminate\Support\Facades\Route;

Route::get('/books', 'App\Http\Controllers\BookController@index');


Route::get('/', function () {
    return view('welcome');
});
