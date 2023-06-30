<?php

use App\Http\Controllers\HistoryTourController;
use Illuminate\Http\Request;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\UserController;
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

// User
Route::get('/user/get_user', [RegisterController::class, 'get_user']);
Route::post('/user/register', [RegisterController::class, 'create']);
Route::post('/user/login',[LoginController::class,'login']);






//test
Route::post('/login', [UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);

//tour
Route::get('/get_tour', [TourController::class,'get_tour']);

Route::post('/create_tour',[TourController::class,'create_tour']);
    Route::post('/booktour', [HistoryTourController::class,'history_tour']);

    Route::delete('/delete_soft_tour', [TourController::class, 'delete_soft_tour']);
    Route::patch('/restore_tour', [TourController::class, 'restore_tour']);
    Route::delete('/delete_tour', [TourController::class, 'delete_tour']);

    Route::post('/update_tour', [TourController::class, 'update_tour']);

    Route::get('/get_bookingtour', [HistoryTourController::class,'get_bookingtour']);

    //confirm tour
    Route::get('/get_confirm_tour', [HistoryTourController::class,'get_confirm_tour']);
    Route::post('/confirm_tour', [HistoryTourController::class, 'confirm_tour']);
    Route::post('/cancel_confirm_tour', [HistoryTourController::class, 'cancel_confirm_tour']);

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/get_user', [UserController::class,'get_user']);
    // Tour

});
