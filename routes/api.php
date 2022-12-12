<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\API\ObjectApi;
use App\Http\API\RfidApi;
use App\Http\API\SensorApi;

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

Route::get('/sensor', [SensorApi::class, 'index']);
Route::post('/sensor/a', [SensorApi::class, 'addData']);

Route::get('/object', [ObjectApi::class, 'index']);
Route::put('/object/e', [ObjectApi::class, 'updateData']);

Route::get('/rfid', [RfidApi::class, 'getRfid']);
Route::post('/rfid/add', [RfidApi::class, 'storeRfid']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
