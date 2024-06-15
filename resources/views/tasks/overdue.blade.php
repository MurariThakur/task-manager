@extends('layouts.appp')

@section('title', 'Overdue Tasks')

@section('content')
    <div class="mt-4">
        <h1>Overdue Tasks</h1>

        @forelse ($overdueTasks as $task)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $task->title }}</h5>
                    <p class="card-text">{{ $task->description }}</p>
                    <p class="card-text"><strong>Category:</strong> {{ $task->category->name }}</p>
                    <p class="card-text"><strong>Priority:</strong> {{ $task->priority }}</p>
                    <p class="card-text"><strong>Status:</strong> {{ $task->status }}</p>
                    <p class="card-text"><strong>Due Date:</strong> {{ $task->due_date }}</p>
                    
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        @empty
            <div class="alert alert-info" role="alert">
                No overdue tasks found.
            </div>
        @endforelse
    </div>
@endsection
