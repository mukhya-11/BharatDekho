<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StateController;
use Illuminate\Support\Str;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ExploreController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/states/{state}', function ($state) {

    $state = Str::of($state)->replace('-', ' ')->title();

    return view('states.show', [
        'state' => $state
    ]);

})->name('states.show');

// One route only for ALL sections (heirtage, history, festivals and culture)
Route::get('/states/{state}/{section}', [StateController::class, 'section'])
    ->name('states.section');

// Route for uploading
Route::get('/upload', [UploadController::class, 'create'])
    ->name('upload.create');

Route::post('/upload', [UploadController::class, 'store'])
    ->name('upload.store');

// For fetching contents for whatever topic is clicked on navbar
Route::get('/explore/{section}', [ExploreController::class, 'index'])
    ->name('explore.section');

// to open the page when the timeline button is clciked
Route::view('/timeline', 'timeline')->name('timeline');