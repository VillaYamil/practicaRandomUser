<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/user', [UserController::class, 'index']);

Route::get('/user/buscar', [UserController::class, 'buscar']);

Route::get('/user/random',[UserController::class,'random']);

Route::get('/user/create',[UserController::class,'create']);

Route::post('/user/store',[UserController::class, 'store']);

Route::get('/user/todos',[UserController::class,'show_all']);



// Route::get('/user/{user}/edit',[UserController::class,'edit']);
// Route::put('/user/{user}',[UserController::class,'update']);
// Route::delete('/user/{user}',[UserController::class,'destroy']);