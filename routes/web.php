<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CandidateController;


Route::get('/', function () {
    return view('login.index', ['title' => 'Login']);
});

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index', ['title' => 'Dashboard']);
})->middleware('auth');

Route::get('/events/{event}',[VotingController::class,'show'])->name('voting.show')->middleware('auth');
Route::post('/events/{event}/vote',[VotingController::class,'vote'])->name('voting.vote')->middleware('auth');

Route::get('events', EventController::class
)->middleware('auth','admin');