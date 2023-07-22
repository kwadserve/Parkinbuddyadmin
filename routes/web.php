<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

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
Route::get('/pb-login', function () {
    return view('admin.login');
});
Route::get('/user_logout', [AuthController::class, 'logout']);

Route::post('/user_login', [AuthController::class, 'authenticate']);
Route::group(['middleware' => 'auth','prefix' => 'pb-admin'], function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
});