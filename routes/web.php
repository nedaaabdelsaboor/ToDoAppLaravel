<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [TaskController::class, 'index'])->name('main');
Route::get('/home',[HomeController::class,'index'])->name('home');


Route::post('/add_task',[TaskController::class,'add_task'])->name('add_task');
Route::get('/destroy/{id}',[TaskController::class,'destroy'])->name('destroy');
Route::post('/update/{id}',[TaskController::class,'update'])->name('update');
Route::get('/add/{id}',[TaskController::class,'add'])->name('add');
Route::post('/filter',[TaskController::class,'filter'])->name('filter');
Route::get('/show',[TaskController::class,'show'])->name('show');

Auth::routes();

