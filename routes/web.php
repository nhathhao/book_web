<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sach','App\Http\Controllers\LayoutController@sach');

Route::get('/sach/theloai/{id}','App\Http\Controllers\LayoutController@theloai');

Route::get('/sach/chitiet/{id}','App\Http\Controllers\LayoutController@chitiet');