<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\Vente\VenteController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Auth\AuthenticationController;

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




// authentication
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

// clients
Route::get('/clients', [ClientController::class, 'index']);
Route::post('/client', [ClientController::class, 'create']);
Route::put('/client/{id}', [ClientController::class, 'update']);
Route::delete('/client/{id}', [ClientController::class, 'destroy']);


// products
Route::get('/products', [ProductController::class, 'index']);
Route::post('/product', [ProductController::class, 'create']);
Route::put('/product/{id}', [ProductController::class, 'update']);
Route::delete('/product/{id}', [ProductController::class, 'destroy']);


// sales
Route::get('/sales', [SaleController::class, 'index']);
Route::post('/sale', [SaleController::class, 'create']);
Route::put('/sale/{id}', [SaleController::class, 'update']);
Route::delete('/sale/{id}', [SaleController::class, 'destroy']);


// home

Route::get('/home', [HomeController::class, 'index']);


// archive
