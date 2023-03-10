<?php

namespace App\Http\Controllers;

use App\Http\Resources\PriorityResource;
use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    public function index(){
        $priorities = Priority::all();

        return PriorityResource::collection($priorities);
    }
}
