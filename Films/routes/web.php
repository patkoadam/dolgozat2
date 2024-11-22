<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/new_genre', [GenreController::class, 'index'])->name('genre.index');
Route::post('/new_genre', [GenreController::class, 'store'])->name('genre.store');

Route::get('/new_film', [FilmController::class, 'create'])->name('films.create');
Route::post('/new_film', [FilmController::class, 'store'])->name('films.store');

Route::get('/films', [FilmController::class, 'index'])->name('films.index');
Route::delete('/films/{id}', [FilmController::class, 'destroy'])->name('films.destroy');

Route::get('/films/{film}', [FilmController::class, 'index'])->name('films.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
