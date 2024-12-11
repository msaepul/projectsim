<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MasterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jenisuratController;

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

    Route::get('/master/jenissurat', [jenisuratController::class, 'index'])->name('master.jenissurat');
    Route::post('/master/jenissurat', [jenisuratController::class, 'store'])->name('master.jenissurat.store');
    Route::get('/master/jenissurat/edit/{id}', [FormController::class, 'edit'])->name('master.jenissurat.edit');
    Route::delete('/master/jenissurat/edit/{id}', [FormController::class, 'destroy'])->name('master.jenissurat.destroy');
    Route::put('/master/jenissurat/update/{id}', [FormController::class, 'update'])->name('master.jenissurat.update');

    Route::get('/master/cabang', [MasterController::class, 'cabang'])->name('master.cabang');
    Route::get('/cabang/add_cabang', [MasterController::class, 'add'])->name('cabang.add_cabang');
    Route::post('/cabang/add/action', [MasterController::class, 'store'])->name('cabang.store');

    Route::delete('/cabang/delete/{id}', [MasterController::class, 'destroy'])->name('cabang.destroy');
    Route::post('/cabang/store', [MasterController::class, 'store'])->name('cabang.store');

    Route::get('/cabang/edit/{id}', [MasterController::class, 'edit'])->name('cabang.edit');
    Route::put('/cabang/update/{id}', [MasterController::class, 'update'])->name('cabang.update');

});

require __DIR__ . '/auth.php';
