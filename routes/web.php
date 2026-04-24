<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;

Route::get('/', [DonationController::class, 'index']);
Route::post('/donasi', [DonationController::class, 'store']);
Route::post('/midtrans/notification', [DonationController::class, 'notification']);