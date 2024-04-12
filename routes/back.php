<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SectionController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Back Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|       $2y$10$GhnSpDfmcVlrMbUQ8MmC6ODJWqpWjE3uEJLXY9Fw7/fmuyq/X34ku
*/


Route::get('/home',[DashboardController::class,'index'])->name('home');


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        ##################################### Dashboard User #################################
        Route::get('/dashboard/user', function () {
            return view('dashboard.User.dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard.user');
        ##################################### End Dashboard User #################################
        
        ##################################### Dashboard Admin ################################
        Route::get('/dashboard/admin', function () {
            return view('dashboard.Admin.dashboard');
        })->middleware(['auth:admin', 'verified'])->name('dashboard.admin');
        ##################################### End Dashboard Admin #################################


        //Section Routes
        Route::middleware('auth:admin')->group(function () {
            Route::resource('/sections', SectionController::class);
            
        });
        require __DIR__.'/auth.php';
    });

    

