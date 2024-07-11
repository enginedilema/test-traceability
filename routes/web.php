<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\SampleTypeController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\SampleTypeExfoliativeController;
use App\Http\Controllers\SampleTypePaafController;
use App\Http\Controllers\OriginLabController;
use App\Http\Controllers\SampleReceptionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
#Sample Routes
Route::resource('statuses', StatusController::class);
Route::resource('sample-types', SampleTypeController::class);
Route::resource('samples', SampleController::class);

#Notes Routes
Route::resource('notes', SampleController::class);

#Station1: SampleReception Routes
Route::prefix('station1')->group(function () {
Route::resource('sample-type-exfoliatives', SampleTypeExfoliativeController::class);
Route::resource('sample-type-paafs', SampleTypePaafController::class);
Route::resource('origin-labs', OriginLabController::class);
Route::resource('sample-receptions', SampleReceptionController::class);
});

Route::get('/station1', function () {
    return view('station1');
})->name('station1');
