<?php

use App\Http\Controllers\Income\IncomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/income', [IncomeController::class, 'store']);
