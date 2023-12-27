<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\SeatAllocationController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// DashBoard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// User Routes
Route::resource('users', UserController::class);

// Location Routes
Route::resource('locations', LocationController::class);

// Trip Routes
Route::resource('trips', TripController::class);

// Seat Allocation Routes
Route::resource('seat_allocations', SeatAllocationController::class);

