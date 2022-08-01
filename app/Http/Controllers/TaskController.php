<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\TaskType;
use App\Models\Lead;
use Illuminate\Support\Carbon;

use function PHPSTORM_META\map;

class TaskController extends Controller
{
    public function index() {
        $title = 'Tasks';
        $tasks = Task::all();
        return view('modules.task.index', compact('title', 'tasks'));
    }

    public function showTasks() {}

    public function delete() {}

    public function create(Lead $lead) {
        $title = 'Create Task';
        $status = TaskStatus::all();
        $type = TaskType::all();
        $lead_type = $lead->project_type;
        $current_user = auth()->user();
        return view('modules.tasks.create', compact('title', 'status', 'type', 'lead_type', 'current_user', 'lead'));
    }

    public function store(Request $request, Lead $lead) {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'priority' => 'required',
            'type_id' => 'required',
            'status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',
        ]);

        $lead->tasks()->create([
            'name' => $request->name,
            'priority' => $request->priority,
            'type_id' => $request->type_id,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
            'created_by_id' => auth()->user()->id,
            'lead_type' => $lead->project_type,
        ]);

        return redirect('/admin/leads')->with('success', 'Task has been created.');
    }
    
    public function edit() {}
}
