<?php

use App\Http\Controllers\PriorityController;
use App\Http\Controllers\TaskActionController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskStatisticController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function (){

    //CRUD for Task
    Route::resource('/tasks', TaskController::class);

    //Action close task
    Route::patch('/close/{task}',  [TaskActionController::class, 'closeTask']);

    //For create task (tasks/Create.vue)
    Route::get('/priorities', [PriorityController::class, 'index']);

    //General statistic
    Route::get('/all_users', [TaskStatisticController::class, 'allUsers']);
    Route::get('/general_all_tasks', [TaskStatisticController::class, 'generalAllTasks']);
    Route::get('/general_done_tasks', [TaskStatisticController::class, 'generalDoneTasks']);

    //Personal statistic
    Route::get('/created_date', [TaskStatisticController::class, 'createdDate']);
    Route::get('/personal_all_tasks', [TaskStatisticController::class, 'personalAllTasks']);
    Route::get('/personal_done_tasks', [TaskStatisticController::class, 'personalDoneTasks']);
});

