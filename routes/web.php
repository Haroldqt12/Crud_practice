<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\ProfileController;

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

Route::get('/people', [PeopleController::class, 'index'])->name('people.index');
Route::post('/people', [PeopleController::class, 'store'])->name('people.store');
Route::get('/edtit/{id}', [PeopleController::class, 'edit'])->name('people.edit');
Route::put('/update/{id}', [PeopleController::class, 'update'])->name('people.update');
Route::delete('/delete/{id}', [PeopleController::class, 'destroy'])->name('people.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
