<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/','App\Http\Controllers\LayoutController@sach');
Route::get('/theloai/{id}','App\Http\Controllers\LayoutController@theloai');
Route::get('/chitiet/{id}','App\Http\Controllers\LayoutController@chitiet');

Route::get('/accountpanel','App\Http\Controllers\AccountController@accountpanel')
->middleware('auth')->name("account"); 

Route::post('/saveaccountinfo','App\Http\Controllers\AccountController@saveaccountinfo')
->middleware('auth')->name('saveinfo');

Route::get('/book/list','App\Http\Controllers\BookController@booklist')
->middleware('auth')->name("booklist");

Route::get('/book/create','App\Http\Controllers\BookController@bookcreate')
->middleware('auth')->name("bookcreate");

Route::get('/book/edit/{id}','App\Http\Controllers\BookController@bookedit')
->middleware('auth')->name("bookedit");

Route::post('/book/save/{action}','App\Http\Controllers\BookController@booksave'
)
->middleware('auth')->name("booksave");

Route::post('/book/delete','App\Http\Controllers\BookController@bookdelete')
->middleware('auth')->name("bookdelete");

Route::get('/book/create','App\Http\Controllers\BookController@bookcreate')
->middleware('auth')->name("bookcreate");

Route::get('/book/edit/{id}','App\Http\Controllers\BookController@bookedit')
->middleware('auth')->name("bookedit");

Route::get('/order','App\Http\Controllers\BookController@order')->name('order');
Route::post('/cart/add','App\Http\Controllers\BookController@cartadd')->name('cartadd');

Route::post('/cart/delete','App\Http\Controllers\BookController@cartdelete')->name('cartdelete');
Route::post('/order/create','App\Http\Controllers\BookController@ordercreate')
->middleware('auth')->name('ordercreate');

Route::post('/bookview','App\Http\Controllers\BookController@bookview')->name('bookview');