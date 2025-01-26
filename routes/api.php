<?php

use App\Http\Controllers\API\ElectionController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index'])->name('users.list');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/elections', [ElectionController::class, 'index'])->name('elections.list');
Route::get('/elections/{election}', [ElectionController::class, 'show'])->name('elections.show');
Route::post('/elections', [ElectionController::class, 'store'])->name('elections.store');
Route::put('/elections/{election}', [ElectionController::class, 'update'])->name('elections.update');
Route::delete('/elections/{election}', [ElectionController::class, 'destroy'])->name('elections.destroy');
