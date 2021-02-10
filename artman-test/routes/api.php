<?php

use App\Http\Controllers\Api\UserStatusController;
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

Route::group(['middleware' => 'auth:api'], function () {
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::group(['prefix' => '/user-status'], function () {
        Route::patch('/', [UserStatusController::class, 'update'])->name('api.user-status.update');
    });

});
