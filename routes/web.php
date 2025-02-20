<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

// مسارات المهام
Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/create', [TaskController::class, 'create']);
Route::post('/tasks/delete/{id}', [TaskController::class, 'delete']);
Route::get('/tasks/edit/{id}', [TaskController::class, 'edit']);
Route::post('/tasks/edit/{id}', [TaskController::class, 'update']);


Route::match(['get', 'post'], '/user', [UserController::class, 'index']); // عرض جميع المستخدمين وإضافة مستخدم جديد

Route::get('/edit/{id}', [UserController::class, 'edit']); // عرض نموذج تعديل المستخدم
Route::post('/edit/{id}', [UserController::class, 'update']); // تحديث بيانات المستخدم

Route::post('/delete/{id}', [UserController::class, 'delete']); // حذف المستخدم
