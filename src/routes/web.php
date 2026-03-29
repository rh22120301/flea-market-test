<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', [ItemController::class, 'index']);

Route::middleware('auth')-> get('/mypage/profile', [ItemController::class, 'profile']);
Route::middleware('auth')-> post('/mypage/profile', [ItemController::class, 'saveprofile']);
Route::middleware('auth')-> get('/mypage', [ItemController::class, 'mypage']);
Route::middleware('auth')-> get('/sell', [ItemController::class, 'sellView']);
Route::middleware('auth')-> post('/sell', [ItemController::class, 'sell']);
Route::get('/product/{product_id}', [ItemController::class, 'detail']);
Route::middleware('auth')-> post('/product/{product_id}/like', [ItemController::class, 'like'])->name('products.like');
Route::middleware('auth')-> post('/product/{product_id}/unlike', [ItemController::class, 'unlike'])->name('products.unlike');
Route::middleware('auth')-> post('/products/{id}/comment', [ItemController::class, 'comment'])->name('products.comment');


Route::middleware('auth')->get('/purchase/{product_id}', [ItemController::class, 'purchase'])->name('purchase');
Route::middleware('auth')->post('/purchase/{product_id}', [ItemController::class, 'purchaseStore'])->name('purchase.store');
Route::middleware('auth')->get('/address/{product_id}', [ItemController::class, 'address'])->name('address');
Route::middleware('auth')->post('/address/{product_id}', [ItemController::class, 'addressUpdate'])->name('address.update');
Route::middleware('auth')->post('/purchase/pay/store', [ItemController::class, 'storePay'])->name('purchase.pay.store');
