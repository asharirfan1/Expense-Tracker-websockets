<?php

use App\Http\Controllers\Transaction\TransactionController;
use App\Http\Controllers\Transaction\TransactionTotalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('transaction' , TransactionController::class);
Route::apiResource('transaction-total' , TransactionTotalController::class);
