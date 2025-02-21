<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

// مسارات المهام
Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks/create', [TaskController::class, 'create']);
Route::post('/tasks/delete/{id}', [TaskController::class, 'delete']);
Route::get('/tasks/edit/{id}', [TaskController::class, 'edit']);
Route::post('/tasks/edit/{id}', [TaskController::class, 'update']);

// مسارات المستخدمين
Route::get('/users', [UserController::class, 'index']);
Route::post('/users/create', [UserController::class, 'create']);
Route::get('/users/edit/{id}', [UserController::class, 'edit']);
Route::post('/users/edit/{id}', [UserController::class, 'update']);
Route::post('/users/delete/{id}', [UserController::class, 'delete']);
