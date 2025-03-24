<?php

use Illuminate\Support\Facades\Route;




use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;

Route::get('/', [PostController::class, 'index']);

Route::post('/posts', [PostController::class, 'store']);

Route::get('/posts/{id}', [PostController::class, 'getOne']);


Route::get('/about', [AboutController::class, 'index']);
