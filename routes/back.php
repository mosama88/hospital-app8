<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\DashboardController;

/*
|--------------------------------------------------------------------------
| Back Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/home',[DashboardController::class,'index'])->name('home');


Route::get('/dashboard/user', function () {
    return view('dashboard.User.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard.user');



Route::get('/dashboard/admin', function () {
    return view('dashboard.Admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('dashboard.admin');



require __DIR__.'/auth.php';
