<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;

// Route principale : page d'accueil
Route::get('/home', [MainController::class, 'home'])->name('home');

// Route Login : appel du contrôleur
Route::get('/', [MainController::class, 'index'])->name('signin');

// Route POST pour traitement
Route::post('/process', [MainController::class, 'process']);

// Route POST Pour signup
Route::post('/signup', [UserController::class, 'signup']);

// Route POST Pour login
Route::post('/login', [UserController::class, 'login']);

// Route events
Route::resource('events', EventController::class);

Route::get('/signup', function() {
    return view('signup');
})->name('signup');

Route::get('/login', function() {
    return view('login');
})->name('login');


