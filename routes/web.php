<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[TaskController::class,'index'])->name('home');
Route::get('category/{category}/tasks',[TaskController::class,'getTaskByCategory'])->name('category_tasks');
Route::get('order/{colums}/{direction}/tasks',[TaskController::class,'getTaskOrderBy'])->name('order_tasks');
