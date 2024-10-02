<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionsController;
use App\Http\Controllers\IndustriesController;
use App\Http\Controllers\CompaniesController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //region routes
    Route::get('/Regions', [RegionsController::class, 'index'])->name('regions');
    Route::post('/regionsstore', [RegionsController::class, 'store'])->name('regions.store');
    Route::get('/regions/{id}/edit', [RegionsController::class, 'edit'])->name('regions.edit');
    Route::put('/regions/{id}', [RegionsController::class, 'update'])->name('regions.update');

    //event routes
    Route::get('/events',[EventsController::class, 'index'])->name('events');



    //industry routes
    Route::get('/Industries', [IndustriesController::class, 'index'])->name('industries');
    Route::post('/industrystore', [IndustriesController::class, 'store'])->name('industries.store');

    //company routes
    Route::get('/Companies', [CompaniesController::class, 'index'])->name('companies');
});

require __DIR__ . '/auth.php';
