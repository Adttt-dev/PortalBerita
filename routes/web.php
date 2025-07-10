<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');
 
Route::get('/news/{slug}', [\App\Http\Controllers\NewsController::class, 'show'])->name('news.show');

Route::get('/author/{username}', [\App\Http\Controllers\AuthorController::class, 'show'])->name('author.show'); 

Route::get('/news/category/{slug}', [\App\Http\Controllers\NewsController::class, 'category'])->name('news.category');