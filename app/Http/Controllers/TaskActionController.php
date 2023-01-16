<?php

namespace App\Http\Controllers;
use App\Models\Task;

class TaskActionController extends Controller
{

    public function closeTask($id){
         $task = Task::where('id', $id)->first();
         $task->is_done = true;
         $task->save();

         return $task;
    }
}
