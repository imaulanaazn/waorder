<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
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

Route::group(['middleware' => 'auth'], function () {
    Volt::route('/create-store', 'pages.store.create-store')->name('create-store');
    Volt::route('/store', 'pages.store.index')->name('store-index');
    Volt::route('/store/reviews', 'pages.store.reviews')->name('store-reviews');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/logout', function () {
    Auth::guard('web')->logout();

    Session::invalidate();
    Session::regenerateToken();
    return redirect('/login');
})->name('logout');

Route::get('/user/settings', function () {
    return view('user.settings');
})->name('user.settings');



require __DIR__ . '/auth.php';
