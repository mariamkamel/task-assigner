<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatisticsController;


// Tasks listing 
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index'); 
// Task Creation
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create'); 
// form submission and store task
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
// Statistics top 10 users
Route::get('/statistics/topUsers', [StatisticsController::class, 'topUsers'])->name('statistics.topUsers');

