@extends('layouts.appp')

@section('title', 'Pending Tasks')

@section('content')
    <div class="mt-4">
        <h1>Pending Tasks</h1>

        @forelse ($pendingTasks as $task)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $task->title }}</h5>
                    <p class="card-text">{{ $task->description }}</p>
                    <p class="card-text"><strong>Category:</strong> {{ $task->category->name }}</p>
                    <p class="card-text"><strong>Priority:</strong> {{ $task->priority }}</p>
                    <p class="card-text"><strong>Status:</strong> {{ $task->status }}</p>
                    @if( $task->due_date)
                    <p class="card-text"><strong>Due Date:</strong> {{ $task->due_date }}</p>
                    @endif
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        @empty
            <p>No pending tasks found.</p>
        @endforelse
    </div>
    @php
    \Illuminate\Support\Facades\Log::info('Rendering pending tasks view.');
@endphp
@endsection
