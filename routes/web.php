<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MasterController;
use Illuminate\Support\Facades\Route;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
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

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

// Group routes that require authentication
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Surat Routes
    Route::get('/surat/list', [FormController::class, 'list'])->name('form.list');
    Route::get('/surat/add', [FormController::class, 'add'])->name('form.add');
    Route::post('/surat/add/action', [FormController::class, 'store'])->name('form.store');
    Route::get('/surat/edit/{id}', [FormController::class, 'edit'])->name('form.edit');
    Route::put('/surat/update/{id}', [FormController::class, 'update'])->name('form.update');
    Route::delete('/surat/delete/{id}', [FormController::class, 'destroy'])->name('form.destroy');





    // Data Routes
    Route::get('/master/data', [MasterController::class, 'data'])->name('master.data');
});

require __DIR__ . '/auth.php';
