<?php

use App\Http\Controllers\API\PhotoController;
use App\Models\Photography;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CategoryController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});



Route::get('photographys', [PhotoController::class, 'index']);

Route::get('photographys/{photography}', [PhotoController::class, 'show']);

Route::get('categories', [CategoryController::class, 'index']);
