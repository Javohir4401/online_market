<?php

use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/file-upload', [FileUploadController::class, 'index']);
Route::post('/file-upload', [FileUploadController::class, 'store']);
Route::get('/files', [FileUploadController::class, 'show']);
