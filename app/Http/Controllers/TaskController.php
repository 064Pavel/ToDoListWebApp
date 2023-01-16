<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::with('priority')->get()->where('user_id', Auth::id())->where('is_done', 0);

        return TaskResource::collection($tasks);
    }

    public function create(){
        $user_id = Auth::id();

        return $user_id;
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $task = Task::create($data);

        return new TaskResource($task);
    }

    public function update(UpdateRequest $request, Task $task)
    {
        $data = $request->validated();
        $task = $task->update($data);
        return TaskResource($task);

    }


    public function destroy(Task $task)
    {
        $task = $task->delete();
        return new TaskResource($task);
    }

}
