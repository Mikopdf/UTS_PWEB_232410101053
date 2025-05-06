<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::redirect('/', '/login');

Route::get('/login', function () {
    return session()->has('username') ? redirect('/dashboard') : view('login');
})->name('login');

Route::post('/login', [PageController::class, 'login'])->name('login.submit');
Route::get('/logout', [PageController::class, 'logout'])->name('logout');


Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');
Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');
