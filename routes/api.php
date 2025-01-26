<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CandidatController;
use App\Http\Controllers\API\CandidatElectionController;
use App\Http\Controllers\API\ElectionController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\VoteController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('/currentuser', [UserController::class, 'currentUser']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

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

Route::get('/candidats', [CandidatController::class, 'index'])->name('candidats.list');
Route::get('/candidats/{candidat}', [CandidatController::class, 'show'])->name('candidats.show');
Route::post('/candidats', [CandidatController::class, 'store'])->name('candidats.store');
Route::put('/candidats/{candidat}', [CandidatController::class, 'update'])->name('candidats.update');
Route::delete('/candidats/{candidat}', [CandidatController::class, 'destroy'])->name('candidats.destroy');

Route::get('/add-candidat/{candidat}/{election}', [CandidatElectionController::class, 'addCandidatToElection'])->name('addCandidatToElection');

Route::get('/vote/{user}/{election}/{candidat}', [VoteController::class, 'addVote'])->name('addVote');
Route::get('/vote/{election}', [VoteController::class, 'getVote'])->name('getVote');
Route::get('/results/{election}', [VoteController::class, 'getResults'])->name('getResults');
