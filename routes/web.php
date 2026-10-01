<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

Route::get('/ricerca/articolo', [PublicController::class, 'searchArticles'])
    ->name('search.article');

Route::get('/nuovo/articolo', [ArticleController::class, 'create'])->name('create.article');

Route::get('/tutti-gli-articoli', [ArticleController::class, 'index'])->name('article.index');

Route::get('/dettaglio/articolo/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/categoria/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');

Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])
    ->middleware('auth')
    ->name('become.revisor');

Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])
    ->name('make.revisor');

Route::middleware(['auth', 'isRevisor'])->group(function () {
    Route::get('/revisor', [RevisorController::class, 'index'])->name('revisor.index');

    Route::patch('/accetta/articolo/{article}', [RevisorController::class, 'acceptArticle'])->name('accept.article');

    Route::patch('/rifiuta/articolo/{article}', [RevisorController::class, 'rejectArticle'])->name('reject.article');
});

Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])
    ->name('setLocale');