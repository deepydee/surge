<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/**
 * App Routes
 */

Route::middleware('auth')->group(function () {
    Route::redirect('/', 'dashboard');
    Route::get('/dashboard', \App\Http\Livewire\Dashboard::class)->name('dashboard');
    Route::get('/profile', \App\Http\Livewire\Profile::class)->name('profile');
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('auth.login');
    });
});


/**
 * Authentication
 */

Route::middleware('guest')->group(function () {
    Route::get('/register', \App\Http\Livewire\Auth\Register::class)->name('auth.register');
    Route::get('/login', \App\Http\Livewire\Auth\Login::class)->name('auth.login');
});
