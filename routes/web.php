<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlumniController;
use Illuminate\Support\Facades\Route;
use App\Models\Alumni;


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

Route::get('/dashboard', [AlumniController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware(['auth'])->group(function () {

    // Search route first
    Route::get('/alumnis/search', [AlumniController::class, 'search'])->name('alumnis.search');
    Route::get('/alumnis/achievements', [AlumniController::class, 'achievements'])->name('alumnis.achievements');
   Route::get('/alumnis/project/{id}', [AlumniController::class, 'projectDetail'])->name('alumnis.projectdetail');
    // Resource routes
    Route::resource('alumnis', AlumniController::class);

});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
