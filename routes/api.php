<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\DeviceCategoryController;
use App\Http\Controllers\DataLogController;

Route::get('/device-categories', [DeviceCategoryController::class, 'index']);

Route::get('/data-logs', [DataLogController::class, 'index']);
Route::get('/data-logs/{id}', [DataLogController::class, 'show']);
Route::post('/data-logs', [DataLogController::class, 'store']);
Route::put('/data-logs/{id}', [DataLogController::class, 'update']);
Route::delete('/data-logs/{id}', [DataLogController::class, 'destroy']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/devices', [DeviceController::class, 'index']);
Route::post('/devices', [DeviceController::class, 'store']);
Route::get('/devices/{id}', [DeviceController::class, 'show']);
Route::put('/devices/{id}', [DeviceController::class, 'update']);
Route::delete('/devices/{id}', [DeviceController::class, 'destroy']);
Route::get('/test', function () {
 return 'Hello world';
});
