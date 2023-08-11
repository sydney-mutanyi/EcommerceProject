<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionResponseController;

Route::get('stkpush', [TransactionResponseController::class, 'stkPush']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
