<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\StreamController;
use App\Http\Controllers\TestController;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

Route::middleware(['auth:api', 'throttle:60,1'])->group(function () {
    Route::get('test', [TestController::class, 'test']);
});

Route::post('login', [AuthController::class, 'login']);
