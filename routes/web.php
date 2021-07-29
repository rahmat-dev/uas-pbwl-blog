<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AlbumController;

Route::get('/', function () {
  return view('index');
});

Route::resource('category', CategoryController::class);
Route::resource('post', PostController::class);
Route::resource('photo', PhotoController::class);
Route::resource('album', AlbumController::class);
