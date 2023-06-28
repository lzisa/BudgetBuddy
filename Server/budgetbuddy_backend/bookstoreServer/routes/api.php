<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//transactions
Route::get('transactions', [TransactionController::class, 'index']);
Route::get('transactions/{user_id}', [TransactionController::class, 'getTransactionsOfUser']);
Route::post('transactions', [TransactionController::class, 'save']);
Route::delete('transactions/{transaction_id}', [TransactionController::class, 'delete']);
Route::put('transactions/{transaction_id}', [TransactionController::class, 'update']);
