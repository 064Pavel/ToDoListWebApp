<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskStatisticController extends Controller
{
    public function allUsers(){
        $allUsers = User::all()->count();

        return $allUsers;
    }

    public function generalAllTasks(){
        $allTasks = Task::all()->count();

        return $allTasks;
    }

    public function generalDoneTasks(){
        $doneTasks = Task::all()->where('is_done', true)->count();
        return $doneTasks;
    }

    public function createdDate(){
        $createdDate = User::select('created_at')->where('id', Auth::id())->get();
        return $createdDate;
    }

    public function personalAllTasks(){
        $allTasks = Task::get()->where('user_id', Auth::id())->count();
        return $allTasks;
    }

    public function personalDoneTasks(){
        $doneTasks = Task::all()->where('is_done', true)->where('user_id', Auth::id())->count();
        return $doneTasks;
    }
}
