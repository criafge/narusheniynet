<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class, 'index'])->name('index');
Route::post('/signin', [UserController::class, 'signin'])->name('signin');
Route::post('/signup', [UserController::class, 'signup'])->name('signup');
Route::get('logout', [UserController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'auth'], function(){
    Route::get('home', [UserController::class, 'cabinet'])->name('home');

    Route::group(['prefix' => 'user'], function(){
        Route::get('/data', [UserController::class, 'userData'])->name('data');
        Route::post('/change', [UserController::class, 'changeData'])->name('change');
    });
    Route::group(['prefix' => 'application'], function(){
        Route::get('/', [UserController::class, 'applicationForm'])->name('application');
        Route::post('/create', [UserController::class, 'createApplication'])->name('application-create');
        Route::get('/delete/{application}', [UserController::class, 'deleteApplication'])->name('delete-application');
    });
});

Route::group(['middleware' => 'auth', 'admin'], function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('applications/{application}/status/confirm', [AdminController::class, 'confirm'])->name('confirm');
    Route::get('applications/{application}/status/refuse', [AdminController::class, 'refuse'])->name('refuse');
});

