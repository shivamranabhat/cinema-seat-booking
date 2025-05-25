<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TheaterController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;

Route::controller(PageController::class)->group(function(){
    Route::get('/', 'index')->name('home');
    Route::get('/signin', 'login')->name('login');
    Route::get('/signup', 'signup')->name('signup');
    Route::get('/movies', 'movies')->name('home.movies');
    Route::get('/movie/{slug}', 'details')->name('movie.details');
});
Route::prefix('/dashboard')->controller(AdminAuthController::class)->group(function(){
    Route::get('/login','login')->name('admin.login');
    Route::post('/auth','authenticate')->name('admin.authenticate');
    Route::post('/register','register')->name('admin.register');
    Route::post('/logout','logout')->name('admin.logout');
});

Route::prefix('/dashboard')->middleware(Authenticate::class)->group(function(){
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
     Route::controller(AdminAuthController::class)->group(function () {
        Route::get('/profile', 'edit')->name('admin.profile');
        Route::put('/update-profile', 'update')->name('adminProfile.update');
    });
    //Routes for account
    Route::prefix('/account')->controller(UserController::class)->group(function(){
        Route::get('/','index')->name('accounts');
        Route::get('/create','create')->name('account.create');
        Route::post('/store','store')->name('account.store');
        Route::get('/{id}','edit')->name('account.edit');
        Route::put('/update/{id}','update')->name('account.update');
        Route::delete('/delete/{id}','destroy')->name('account.destroy');
    });
    //Routes for movies
    Route::prefix('/movie')->controller(MovieController::class)->group(function(){
        Route::get('/','index')->name('movies');
        Route::get('/create','create')->name('movie.create');
        Route::post('/store','store')->name('movie.store');
        Route::get('/{slug}','edit')->name('movie.edit');
        Route::put('/update/{slug}','update')->name('movie.update');
        Route::delete('/delete/{slug}','destroy')->name('movie.destroy');
    });
    //Routes for theaters
    Route::prefix('/theater')->controller(TheaterController::class)->group(function(){
        Route::get('/','index')->name('theaters');
        Route::get('/create','create')->name('theater.create');
        Route::post('/store','store')->name('theater.store');
        Route::get('/{slug}','edit')->name('theater.edit');
        Route::put('/update/{slug}','update')->name('theater.update');
        Route::delete('/delete/{slug}','destroy')->name('theater.destroy');
    });
    //Routes for seats
    Route::prefix('/seat')->controller(SeatController::class)->group(function(){
        Route::get('/','index')->name('seats');
        Route::get('/create','create')->name('seat.create');
        Route::post('/store','store')->name('seat.store');
        Route::get('/{slug}','edit')->name('seat.edit');
        Route::put('/update/{slug}','update')->name('seat.update');
        Route::delete('/delete/{slug}','destroy')->name('seat.destroy');
    });
    //Routes for bookings
    Route::prefix('/booking')->controller(BookingController::class)->group(function(){
        Route::get('/','index')->name('bookings');
        Route::post('/cancel/{slug}','cancel')->name('booking.cancel');
        Route::get('/{slug}','edit')->name('booking.edit');
        Route::put('/update/{slug}','update')->name('booking.update');
        Route::delete('/delete/{slug}','destroy')->name('booking.destroy');
    });
});
