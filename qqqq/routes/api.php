<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin_AuthController;
use App\Http\Controllers\Admin\QuoteController;


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

Route::group([
    'middleware' => 'api'

], function ($router) {
    Route::post('/login_01', [AuthController::class, 'login']);
    Route::post('/register_01', [AuthController::class, 'register']);
    Route::post('/logout_01', [AuthController::class, 'logout']);
    Route::post('/refresh_01', [AuthController::class, 'refresh']);
    Route::get('/user-profile_01', [AuthController::class, 'userProfile']); 

    Route::post('/register_admin', [Admin_AuthController::class, 'register']);    
    Route::post('/login_admin', [Admin_AuthController::class, 'login']);    
    Route::get('/adProfile', [Admin_AuthController::class, 'adminprofile']); 
    Route::post('/adLogout', [Admin_AuthController::class, 'logout']);    
    Route::post('/adRefresh', [Admin_AuthController::class, 'refresh']);
    
    Route::get('/getAdmin', [AuthController::class, 'getCustomer']);
    
    Route::post('/getQuote{page?}', [QuoteController::class, 'getQuotes']);   
    Route::get('/qoutes', [QuoteController::class , 'getQuotes']); 

});