<?php

use App\Http\Controllers\{CustomerController, MvpController, RankController};
use Illuminate\Support\Facades\Route;

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


Route::get('/', [MvpController::class, 'index']);
Route::get('/mvp', [MvpController::class, 'index'])->name('mvp');
Route::get('/rank', [RankController::class, 'index'])->name('rank');
Route::get('/customer/highest/order/amount', [CustomerController::class, 'findCustomerWithHighestOrderAmount'])->name('findCustomerWithHighestOrderAmount');
Route::get('/customer/most/orders', [CustomerController::class, 'findCustomerWithMostOrders'])->name('findCustomerWithMostOrders');




Route::get('/student', function () {
    return view('student');
})->name('student');

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
