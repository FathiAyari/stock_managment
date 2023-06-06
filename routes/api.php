<?php

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





Route::get('produit', [ProductController::class, 'index']);
Route::post('produit', [ProductController::class, 'store']);
Route::get('produit/{product}', [ProductController::class, 'edit']);
Route::post('produit/{product}', [ProductController::class, 'update']);
Route::post('produit/{product}/supprimer', [ProductController::class, 'destroy']);
// Route::resource('client', ClientController::class);
Route::resource('vente', VenteController::class);
Route::post('archive', [ArchiveController::class, 'uploadFacture']);
Route::get('archive/{archive}', [ArchiveController::class, 'getFac']);
Route::post('searchArchive', [ArchiveController::class, 'search']);




// authentication
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

// clients
Route::get('/clients', [ClientController::class, 'index']);
Route::post('/client', [ClientController::class, 'create']);
Route::put('/client/{id}', [ClientController::class, 'update']);
Route::delete('/client/{id}', [ClientController::class, 'destroy']);


// products


// sales


// archive
