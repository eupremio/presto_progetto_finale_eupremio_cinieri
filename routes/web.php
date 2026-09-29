<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

Route::get('/nuovo/articolo', [ArticleController::class, 'create'])->name('create.article');

Route::get('/tutti-gli-articoli', [ArticleController::class, 'index'])->name('article.index');

Route::get('/dettaglio/articolo/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/categoria/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');