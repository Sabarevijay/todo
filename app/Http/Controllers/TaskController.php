<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
   
    public function index()
    {
        
        $tasks = Task::where('user_id', Auth::id())
                 ->orderBy('is_completed')
                 ->get();
        return view('tasks.index', compact('tasks'));
    }

    // public function store(Request $request)
    // {
    //     // Validate the incoming request
    //     $request->validate([
    //         'task' => 'required|max:255',
    //     ]);

    //     // Create a new task
    //     Task::create([
    //         'task' => $request->task,
    //     ]);

    //     // Redirect back to the task list
    //     return redirect()->route('tasks.index');
    // }
    public function store(Request $request)
{
    $request->validate([
        'task' => 'required|string|max:255',
    ]);

    $task = new Task();
    $task->task = $request->task;
    $task->user_id = Auth::id(); // Set the user_id to the currently authenticated user
    $task->save();

    return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
}


    public function complete($id, Request $request)
    {
    $task = Task::findOrFail($id);
    $task->is_completed = $request->has('is_completed'); // true if checkbox is checked, false if not
    $task->save();

    return redirect()->route('tasks.index'); // Redirect back to the tasks page
    }

    public function destroy($id)
    {
    // Find the task by ID and delete it
    $task = Task::findOrFail($id);
    $task->delete();
    return redirect()->route('tasks.index');
    }



    


}
