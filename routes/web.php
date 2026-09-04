<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\HeritageController;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Str;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/state/{slug}', [StateController::class, 'show']);
Route::get('/district/{slug}', [DistrictController::class, 'show']);

Route::get('/heritage/{slug}', [HeritageController::class, 'show']);
Route::get('/festival/{slug}', [FestivalController::class, 'show']);

Route::get('/search', [SearchController::class, 'index']);

Route::get('/profile', [ProfileController::class, 'index']);

Route::get('/admin', [AdminController::class, 'index']);



Route::get('/states/{state}', function ($state) {

    $state = Str::of($state)->replace('-', ' ')->title();

    return view('states.show', [
        'state' => $state
    ]);

})->name('states.show');