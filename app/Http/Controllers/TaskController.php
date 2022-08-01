<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Task $task) {
        dd($task);
    }
    public function showTasks() {}

    public function delete() {}

    public function create() {}

    public function store() {}
    
    public function edit() {}
}
