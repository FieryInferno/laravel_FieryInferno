<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('login');
});

Route::post('/login', [App\Http\Controllers\LoginController::class, 'store'])->middleware('guest')->name('login');
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->middleware('auth');
Route::middleware('auth')->group(function () {
  Route::prefix('rumah_sakit')->group(function () {
    Route::get('/', [App\Http\Controllers\RumahSakitController::class, 'index']);
    Route::get('/tambah', [App\Http\Controllers\RumahSakitController::class, 'create']);
    Route::post('/tambah', [App\Http\Controllers\RumahSakitController::class, 'store']);
    Route::get('/edit/{id}', [App\Http\Controllers\RumahSakitController::class, 'edit']);
    Route::put('/edit/{id}', [App\Http\Controllers\RumahSakitController::class, 'update']);
    Route::delete('/hapus/{id}', [App\Http\Controllers\RumahSakitController::class, 'destroy']);
  });
});
