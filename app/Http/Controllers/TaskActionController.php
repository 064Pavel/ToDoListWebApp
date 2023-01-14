<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCloseRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskActionController extends Controller
{

    public function closeTask(TaskCloseRequest $request, $id){
         $task = Task::where('id', $id)->first();
         $task->is_done = true;
         $task->save();

         return $task;
    }
}
