<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'homepage'])->name('pages.homepage');


Route::get('/films', [FilmController::class, 'index'])->name('films.index');
Route::get('/films/create', [FilmController::class, 'create'])->name('films.create')->middleware('auth');
Route::post('/films', [FilmController::class, 'store'])->name('films.store')->middleware('auth');

Route::get('/films/{film}', [FilmController::class, 'show'])->name('films.show');

Route::get('/films/{film}/modifica', [FilmController::class, 'edit'])->name('films.edit');
Route::put('/films/{film}/aggiorna', [FilmController::class, 'update'])->name('films.update');

Route::delete('/films/{film}/elimina', [FilmController::class, 'destroy'])->name('films.destroy');
