<?php

use App\Http\Controllers\TasksapiContoller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/task/all',[TasksapiContoller::class,'all']);
Route::post('/task/create',[TasksapiContoller::class,'create']);
Route::delete('/task/destroy/{id}',[TasksapiContoller::class,'destroy']);
Route::post('/task/update/{id}',[TasksapiContoller::class,'update']);
Route::get('/task/filter',[TasksapiContoller::class,'filter']);

