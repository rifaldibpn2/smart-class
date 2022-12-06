<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\API\ObjectApi;

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
//panggil Api dataobject
Route::get('/dataobject', [ObjectApi::class, 'index']);
Route::put('/dataobject/e', [ObjectApi::class, 'updateData']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
