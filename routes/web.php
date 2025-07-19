<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('login.index', ['title' => 'Login']);
});

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth');

Route::get('/voting/show',[VotingController::class,'show'])->name('voting.show')->middleware('auth');
Route::post('/voting/vote',[VotingController::class,'vote'])->name('voting.vote')->middleware('auth');


Route::resource('events',EventController::class);

Route::get('/events/{events}/candidates',
[CandidateController::class,'index'])->middleware('auth','admin');
Route::get('/events/{events}/candidates/create',
[CandidateController::class,'create'])->middleware('auth','admin');
Route::post('/events/{events}/candidates',
[CandidateController::class,'store'])->middleware('auth','admin');

Route::get('/events/{event}/candidates/{candidate}/edit',[CandidateController::class,'edit']);
Route::get('/events/{event}/candidates/{candidate}',[CandidateController::class,'update'])->middleware('auth','admin');
Route::get('/events/{event}/candidates/{candidate}/edit',[CandidateController::class,'destroy'])->middleware('auth','admin');


Route::get('/result/{event:name}',[ResultController::class,'show'])->middleware('auth');
Route::get('/result',[ResultController::class,'index'])->middleware('auth');
