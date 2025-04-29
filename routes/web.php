<?php

use App\Http\Controllers\Fragments\FragmentsPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Words\WordsPageController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register')
    ]);
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'getIndexPage'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'editEntity'])->name('profile.api.edit');
    Route::delete('/profile', [ProfileController::class, 'destroyEntity'])->name('profile.api.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/hub', function () {
        return Inertia::render('Hub/Index');
    })->name('hub.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/fragments', [FragmentsPageController::class, 'index'])->name('fragments.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/words', [WordsPageController::class, 'index'])->name('words.index');
});

Route::get('/not-found', fn() => Inertia::render('NotFound'))->name('not-found');

require __DIR__ . '/auth.php';
