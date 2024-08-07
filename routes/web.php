<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EmployeeController::class, 'index'])->name('index');

Route::post('/list', [EmployeeController::class, 'list'])->name('list');
Route::post('/detail', [EmployeeController::class, 'detail'])->name('detail');
