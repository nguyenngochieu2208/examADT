<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EmployeeController::class, 'index'])->name('index');

Route::get('/list', [EmployeeController::class, 'list'])->name('list');
Route::get('/detail', [EmployeeController::class, 'detail'])->name('detail');
