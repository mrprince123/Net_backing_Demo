<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

// Basic Route
Route::get('/', [BasicController::class, 'view']);

// Auth Route
Route::get('/login', [AuthController::class, 'viewLogin']);
Route::get('/register', [AuthController::class,  'viewRegister']);
Route::post('/login', [AuthController::class,  'login']);
Route::post('/register', [AuthController::class,  'register']);
Route::get('/logout', [AuthController::class, 'logout']);

// Account Route
Route::get('/account', [AccountController::class, 'index']);
Route::post('/account/create', [AccountController::class, 'create']);
Route::get('/account/show/{id}', [AccountController::class, 'show']);
Route::get('/account/edit/{id}', [AccountController::class, 'edit']);
Route::get('/account/update/{id}', [AccountController::class, 'update']);
Route::get('/account/delete/{id}', [AccountController::class, 'index']);

// Transaction Route
Route::get('/transaction', [TransactionController::class, 'index']);
Route::get('/transaction/create', [TransactionController::class, 'store']);
Route::get('/transaction/show/{id}', [TransactionController::class, 'show']);
Route::get('/transaction/edit/{id}', [TransactionController::class, 'edit']);
Route::get('/transaction/update/{id}', [TransactionController::class, 'update']);
Route::get('/transaction/delete/{id}', [TransactionController::class, 'destroy']);