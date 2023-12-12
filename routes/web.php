<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::get('roles', function () {
        return view('admin.roles');
    })->name('admin.roles');

    Route::get('approved', function () {
        return view('admin.approved');
    })->name('admin.approved');

    Route::get('permission', function () {
        return view('admin.permission');
    })->name('admin.permission');

    Route::get('user', function () {
        return view('admin.user');
    })->name('admin.user');
    
    Route::get('maps', function () {
        return view('admin.maps');
    })->name('admin.maps');

    Route::get('summary', function () {
        return view('admin.summary');
    })->name('admin.summary');
});


Route::middleware(['checkApproved'])->group(function () {
    Route::view('user/dashboard', 'user.dashboard')->name('user.dashboard');
    Route::view('user/home', 'user.home')->name('user.home');
    Route::view('user/alumnilist', 'user.alumnilist')->name('user.alumnilist');
    Route::view('user/event', 'user.event')->name('user.event');
    Route::view('user/donations', 'user.donations')->name('user.donations');
    Route::view('user/jobs-offering', 'user.jobs-offering')->name('user.jobs-offering');
    Route::view('user/profile', 'user.profile')->name('user.profile');
});




require __DIR__.'/auth.php';
