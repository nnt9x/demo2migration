<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/offices', [\App\Http\Controllers\OfficeController::class, 'index']);

Route::get('/offices/create', [\App\Http\Controllers\OfficeController::class, 'create'])->name('office-create');

Route::post('/offices/create', [\App\Http\Controllers\OfficeController::class, 'save']);

Route::delete('/offices/delete', [\App\Http\Controllers\OfficeController::class, 'delete']);

Route::get('/offices/{id}', [\App\Http\Controllers\OfficeController::class, 'show'])->name('office-show');


