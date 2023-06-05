<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TaskController;


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



Route::get('/', [PagesController::class, 'indexdashboard'])->name('dashboard'); 
Route::post('/saveTask', [TaskController::class, 'storetask'])->name('saveTask');
Route::get('/markasCompleted/{id}', [TaskController::class, 'updatetask'])->name('markasCompleted');
Route::get('/markasNotCompleted/{id}', [TaskController::class, 'updateNottask'])->name('markasNotCompleted');
Route::get('/deletetask/{id}', [TaskController::class, 'deletetask'])->name('deletetask');


