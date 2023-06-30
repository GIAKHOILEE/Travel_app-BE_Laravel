<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Register user
Route::get('/register/user',[RegisterController::class,'index']);
Route::post('/register/user/store', [RegisterController::class, 'store']);

//Register partner
Route::get('/register/partner',[RegisterController::class,'index']);
Route::post('/register/partner/store', [RegisterController::class, 'store']);

//login
// Route::get('/login', function () {
//     return view('login');
// });
Route::get('/login/user',[loginController::class,'a'] );
// Route::post('/login/user/authenticate',[loginController::class,'authenticate']);
Route::post('/login', [loginController::class,'authenticate'])->name('login');

