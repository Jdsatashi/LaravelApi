<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\AuthController;
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

Route::group(['middleware' => ['auth:sanctum']], function(){
    # Api country route
    Route::controller(CountryController::class)->group(function (){
        Route::get('countries', 'index');
        Route::post('countries/add', 'store');
        Route::get('country/{id}', 'show');
        Route::put('country/{id}', 'update');
        Route::get('countries/archive', 'archive');
        Route::delete('country/{id}', 'destroy');
        Route::get('countries/archive/{id}', 'restore');
    });

    # logout route
    Route::post('logout', [AuthController::class, 'logout']);
});


# Authentication route
Route::controller(AuthController::class)->group(function(){
    Route::post('login', 'login');
    Route::post('register', 'Register');
});
