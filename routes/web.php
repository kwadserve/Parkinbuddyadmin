<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\PassController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ParkingController;

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
Route::get('/clear-cache', function (){
    Artisan::call('optimize:clear');
   
    echo "all cleared";
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pb-login', function () {
    return view('admin.login');
})->name('login');

Route::get('/user_logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/user_login', [AuthController::class, 'authenticate']);
Route::group(['middleware' => 'auth','prefix' => 'pb-admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/user/{id}/view', [UserController::class, 'viewDetail']);
    Route::get('/user/bookings', [UserController::class, 'userBookingListing']);
    Route::get('/user/passes', [UserController::class, 'userPassesListing']);
    Route::get('/user/vehicles', [UserController::class, 'userVehiclesListing']);
    Route::get('/vehicles', [VehicleController::class, 'index']);
    Route::get('/passes', [PassController::class, 'index']);
    Route::get('/bookings', [BookingController::class, 'index']);
    Route::get('/parkings', [ParkingController::class, 'index']);
    Route::get('/parkings/{id}/view', [ParkingController::class, 'viewDetail']);
    Route::get('/parking/bookings', [ParkingController::class, 'parkingBookingListing']);
});