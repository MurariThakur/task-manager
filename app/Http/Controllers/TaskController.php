<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
{
    $tasksQuery = Task::with('category');

    if ($request->filled('status')) {
        $status = $request->status;
        $tasksQuery->where('status', $status);
    }
    if ($request->filled('category_id')) {
        $category_id = $request->category_id;
        $tasksQuery->where('category_id', $category_id);
    }
    if ($request->filled('priority')) {
        $priority = $request->priority;
        $tasksQuery->where('priority', $priority);
    }

    if ($request->filled('search')) {
        $search = $request->search;
        $tasksQuery->where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
        });
    }


    $tasks = $tasksQuery->paginate(5); 

    $categories = Category::all();

    return view('tasks.index', compact('tasks', 'categories'));
}

    public function create()
    {
        $categories = Category::all();
        return view('tasks.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,completed',
            'priority' => 'required|in:low,medium,high',
            'category_id' => 'nullable|exists:categories,id',
            'due_date' => 'nullable|date',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,txt,csv|max:2048'
        ]);

        $task = new Task($request->all());
        $task->user_id = Auth::id();

        if ($request->hasFile('attachment')) {
            $filePath = $request->file('attachment')->store('attachments', 'public');
            $task->attachment = $filePath;
        }

        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    public function show(Task $task)
    {
        $this->authorize('view', $task); 
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $this->authorize('update', $task); 
        $categories = Category::all();
        return view('tasks.edit', compact('task', 'categories'));
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task); 

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,completed',
            'priority' => 'required|in:low,medium,high',
            'category_id' => 'nullable|exists:categories,id',
            'due_date' => 'nullable|date',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,txt,csv|max:2048'
        ]);

        $task->fill($request->all());

        if ($request->hasFile('attachment')) {
            $filePath = $request->file('attachment')->store('attachments', 'public');
            $task->attachment = $filePath;
        }

        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task); 
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
    public function completed()
    {
        $user_id = Auth::id();
        $completedTasks = Task::where('user_id', $user_id)->where('status', 'completed')->get();

        return view('tasks.completed', compact('completedTasks'));
    }

     public function pending()
    {
        $user_id = Auth::id();
        $pendingTasks = Task::where('user_id', $user_id)->where('status', 'pending')->get();

        return view('tasks.pending', compact('pendingTasks'));
    }

    public function overdue()
    {
        $user_id = Auth::id();
        $overdueTasks = Task::where('user_id', $user_id)->where('status', '!=', 'completed')->where('due_date', '<', now())->get();

        return view('tasks.overdue', compact('overdueTasks'));
    }
}
