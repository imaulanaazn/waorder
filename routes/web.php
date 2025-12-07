<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Volt::route('/', 'pages.home')->name('home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function () {
        Volt::route('/dashboard', 'pages.admin.dashboard')->name('admin_dashboard');
        Volt::route('/products', 'pages.admin.products.index')->name('admin_products');
    });
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
