@extends('layouts.appp')

@section('content')
<div class="container mt-5">
    <h2>Task Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $task->title }}</h5>
            <p class="card-text"><strong>Description:</strong> {{ $task->description }}</p>
            <p class="card-text"><strong>Status:</strong> {{ ucfirst($task->status) }}</p>
            <p class="card-text"><strong>Priority:</strong> {{ ucfirst($task->priority) }}</p>
            @if ($task->category)
            <p class="card-text"><strong>Category:</strong> {{ $task->category->name ?? '' }}</p>
            @endif
            @if ($task->due_date)
            <p class="card-text"><strong>Due Date:</strong> {{ $task->due_date }}</p>
            @endif
            @if ($task->attachment)
            <p class="card-text"><strong>Attachment:</strong> <a href="{{ asset('storage/' . $task->attachment) }}" target="_blank">View Attachment</a></p>
            @endif
            <a href="{{ route('tasks.index') }}" class="btn btn-primary">Back to Tasks</a>
        </div>
    </div>
</div>
@endsection
