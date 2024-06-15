@extends('layouts.appp')

@section('title', 'Completed Tasks')

@section('content')
    <div class="mt-4">
        <h1>Completed Tasks</h1>

        @forelse ($completedTasks as $task)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $task->title }}</h5>
                    <p class="card-text">{{ $task->description }}</p>
                    <p class="card-text"><strong>Category:</strong> {{ $task->category }}</p>
                    <p class="card-text"><strong>Priority:</strong> {{ $task->priority }}</p>
                    <p class="card-text"><strong>Status:</strong> {{ $task->status }}</p>
                    <p class="card-text"><strong>Due Date:</strong> {{ $task->due_date }}</p>
                    <!-- Add more details as needed -->
                </div>
            </div>
        @empty
            <div class="alert alert-info" role="alert">
                No completed tasks found.
            </div>
        @endforelse
    </div>
@endsection
