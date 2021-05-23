<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin_AuthController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\Admin\SubAdminController;
use App\Http\Controllers\Admin\AuthorsController;


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
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login_01', [AuthController::class, 'login']);
    Route::post('/register_01', [AuthController::class, 'register']);
    Route::post('/logout_01', [AuthController::class, 'logout']);
    Route::post('/refresh_01', [AuthController::class, 'refresh']);
    Route::get('/user-profile_01', [AuthController::class, 'userProfile']); 

    Route::post('/register_admin', [Admin_AuthController::class, 'register']);    
    Route::post('/login_admin', [Admin_AuthController::class, 'login']); 

    Route::get('/adProfile', [Admin_AuthController::class, 'adminprofile'])->middleware('jwt.verify'); //

    Route::post('/adLogout', [Admin_AuthController::class, 'logout']);    
    Route::post('/adRefresh', [Admin_AuthController::class, 'refresh']);
    
    Route::get('/getAdmin', [AuthController::class, 'getCustomer']);
    
    Route::get('/getQuote{page?}', [QuoteController::class, 'getQuotes'])->middleware('jwt.verify');   

    Route::get('/quote_details/{quote}', [QuoteController::class, 'getQuote_details'])->middleware('jwt.verify');

    Route::delete('/quote_delete/{quote}', [QuoteController::class, 'destroy'])->middleware('jwt.verify'); 

    Route::post('/add_quotes', [QuoteController::class, 'store'])->middleware('jwt.verify');    
    Route::post('/edit_quotes/{quote}', [QuoteController::class, 'update'])->middleware('jwt.verify');    


    /*---------------------------------- Sub Admin ---------------------------------------------*/

    Route::get('/get_all_sub_admin', [SubAdminController::class, 'index'])->middleware('jwt.verify');    
    Route::get('/getSub_admin/{sub_admin}', [SubAdminController::class, 'sub_admin_detail'])->middleware('jwt.verify');   

     /*---------------------------------- Author ---------------------------------------------*/ 

    Route::get('/get_all_author', [AuthorsController::class, 'getAuthors'])->middleware('jwt.verify');    
    Route::get('/get_author/{author}', [AuthorsController::class, 'show'])->middleware('jwt.verify');    
    Route::post('/create_author', [AuthorsController::class, 'store'])->middleware('jwt.verify');    
    Route::post('/edit_author/{author}', [AuthorsController::class, 'update'])->middleware('jwt.verify');    
    Route::delete('/delete_author/{author}', [AuthorsController::class, 'destroy'])->middleware('jwt.verify');    
});