<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;

Route::get('/', [FilmController::class, 'index'])->name('index');
Route::post('/', [FilmController::class, 'store'])->name('films.store');
Route::get('/creation-de-vos-films', [FilmController::class, 'create'])->name('films.create');
Route::get('/vos-films/{film}/edit', [FilmController::class, 'edit'])->name('films.edit');
Route::delete('/vos-films/{film}/delete', [FilmController::class, 'destroy'])->name('films.destroy');
Route::get('/vos-films/{film}', [FilmController::class, 'show'])->name('films.show');
