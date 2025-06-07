<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\VotingController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('voting.enter');
// });

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/validate-user', [VoteController::class, 'validateUser'])->name('validate.user');
Route::post('/submit-vote', [VoteController::class, 'submitVote'])->name('submit.vote');

// Route::get('/', [VotingController::class, 'showVoterIdForm'])->name('voter.enter'); // Masukkan voter ID
// Route::post('/', [VotingController::class, 'validateVoterId'])->name('voter.enter'); // Validasi voter ID
// Route::get('/vote', [VotingController::class, 'showVotingPage'])->name('voting.page'); // Halaman voting
// Route::post('/vote', [VotingController::class, 'submitVote'])->name('voting.page'); // Kirim vote

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
