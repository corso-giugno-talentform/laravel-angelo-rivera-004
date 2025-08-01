<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'homepage'])->name('pages.homepage');


Route::get('/film', [FilmController::class, 'index'])->name('films.index');
Route::get('/film/crea-film', [FilmController::class, 'create'])->name('films.create')->middleware('auth');
Route::post('/film/salva-film', [FilmController::class, 'store'])->name('films.store')->middleware('auth');
