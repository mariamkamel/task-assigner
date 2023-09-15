<?php

// app/Http/Controllers/TaskController.php
namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Statistics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function create()
    {
        // Get non-admin users for "Assigned To"
        $assignedToUsers = User::where('is_admin', false)->get();
        // Get admin users for "Assigned By"
        $assignedByUsers = User::where('is_admin', true)->get();
        return view('tasks.create', compact('assignedToUsers', 'assignedByUsers'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'assigned_to_id' => 'required|exists:users,id',
            'assigned_by_id' => 'required|exists:users,id',

        ]);
        Task::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'assigned_to_id' => $validatedData['assigned_to_id'],
            'assigned_by_id' => $validatedData['assigned_to_id']
        ]);
    

        // Find or create the statistics record for the user and increment the task count
        $statistics = Statistics::firstOrCreate(['user_id' => $validatedData['assigned_to_id']]);
        $statistics->increment('task_count');

        // Redirect to the task listing page 
        return redirect()->route('tasks.index');
    }
    public function index()
    {
        $tasks = Task::paginate(10); 
        return view('tasks.index', compact('tasks'));
    }

}
