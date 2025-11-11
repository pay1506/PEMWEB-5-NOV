<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return redirect()->route('table');
});

Route::get('/form', [MahasiswaController::class, 'create'])->name('form');
Route::post('/store', [MahasiswaController::class, 'store'])->name('store');
Route::get('/table', [MahasiswaController::class, 'index'])->name('table');
Route::get('/edit/{id}', [MahasiswaController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [MahasiswaController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [MahasiswaController::class, 'destroy'])->name('delete');
