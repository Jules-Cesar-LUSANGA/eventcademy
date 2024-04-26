<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('events', EventController::class);

    Route::get('my-events', [EventController::class, 'myEvents'])->name('my-events');

    Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function(){
        
        Route::get('/{user}', 'show')->name('show');

        Route::get('/', 'edit')->name('edit');
        Route::put('/', 'update')->name('update');

        Route::put('/password', 'updatePassword')->name('update-password');
    });

    Route::controller(ReservationController::class)->prefix('reservations')->name('reservations.')->group(function(){
        
        Route::get('', 'agenda')->name('agenda');

        Route::post('/{event}', 'set')->name('set');
        Route::delete('/{event}', 'unset')->name('unset');
    });

});

Route::controller(AuthController::class)->group(function(){
    Route::get('login', 'login')->name('login');
    Route::post('login', 'setLoged')->name('login');

    Route::get('register', 'register')->name('register');
    Route::post('register', 'store')->name('register');

    Route::delete('logout', 'logout')->name('logout');
});
