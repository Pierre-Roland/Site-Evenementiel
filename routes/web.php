<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;

// Route principale : page d'accueil
Route::get('/home', [MainController::class, 'home']);

// Route Login : appel du contrôleur
Route::get('/', [MainController::class, 'index']);

// Route POST pour traitement
Route::post('/process', [MainController::class, 'process']);

// Route POST Pour signup
Route::post('/signup', [UserController::class, 'signup']);

// Route POST Pour login
Route::post('/login', [UserController::class, 'login']);

Route::get('/signup', function() {
    return view('signup');
})->name('signup');

Route::get('/login', function() {
    return view('login');
})->name('login');

