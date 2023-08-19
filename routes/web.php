<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

// Laravel UI Auth routes - disable register/signup
Auth::routes(['register' => false]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('locations', [App\Http\Controllers\LocationController::class, 'index'])->name('locations.index');
Route::get('locations/{location}', [App\Http\Controllers\LocationController::class, 'show'])->name('locations.show');
Route::get('locations/create', [App\Http\Controllers\LocationController::class, 'create'])->name('locations.create');
Route::post('locations', [App\Http\Controllers\LocationController::class, 'store'])->name('locations.store');
Route::get('locations/{location}/edit', [App\Http\Controllers\LocationController::class, 'edit'])->name('locations.edit');
Route::put('locations/{location}', [App\Http\Controllers\LocationController::class, 'update'])->name('locations.update');
Route::delete('locations/{location}', [App\Http\Controllers\LocationController::class, 'destroy'])->name('locations.destroy');
