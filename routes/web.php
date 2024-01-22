<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class, 'index'])->name('index');

Route::post('/signin', [UserController::class, 'signin'])->name('signin');
Route::post('/signup', [UserController::class, 'signup'])->name('signup');

Route::get('home', [UserController::class, 'cabinet'])->name('home');

Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('/application', [UserController::class, 'applicationForm'])->name('application')->middleware('auth');
Route::post('/application/create', [UserController::class, 'createApplication'])->name('application-create')->middleware('auth');
Route::get('application/delete/{application}', [UserController::class, 'deleteApplication'])->name('delete-application')->middleware('auth');
Route::post('/user/change');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('applications/{application}/status/confirm', [AdminController::class, 'confirm'])->name('confirm');
Route::get('applications/{application}/status/refuse', [AdminController::class, 'refuse'])->name('refuse');
