<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\CommentaireController;


Route::get('/', [FilmController::class, 'index'])->name('index');
Route::post('/', [FilmController::class, 'store'])->name('films.store');
Route::get('/creation-de-vos-films', [FilmController::class, 'create'])->name('films.create');
Route::get('/vos-films/{id}/edit', [FilmController::class, 'edit'])->name('films.edit');
Route::delete('/vos-films/{id}/delete', [FilmController::class, 'destroy'])->name('films.destroy');
Route::get('/vos-films/{id}', [FilmController::class, 'show'])->name('films.show');
Route::put('/vos-films/{film}/update', [FilmController::class, 'update'])->name('films.update');
Route::post('/commentaire', [CommentaireController::class, 'store'])->name('commentaires.store');


