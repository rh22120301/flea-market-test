<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', [ItemController::class, 'index']);
Route::get('/mypage/profile', [ItemController::class, 'profile'])->middleware('auth');