@extends('layouts.appp')

@section('content')
<div class="container mt-5">
    <div class="row mb-3">
        <div class="col">
            <h2>Task List</h2>
        </div>
        <div class="col text-right">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary float-end">Add Task</a>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <form id="filter-form" action="{{ route('tasks.index') }}" method="GET" class="mb-3">
        <div class="row g-3 align-items-center">
            <div class="col-md-3">
                <label for="search" class="visually-hidden">Search</label>
                <input type="text" class="form-control" id="search" name="search" placeholder="Search..." value="{{ Request::get('search') }}">
            </div>
            <div class="col-md-2">
                <label for="status" class="visually-hidden">Status</label>
                <select class="form-select" id="status" name="status">
                    <option value="">Select Status</option>
                    <option value="pending" @if(Request::get('status') == 'pending') selected @endif>Pending</option>
                    <option value="completed" @if(Request::get('status') == 'completed') selected @endif>Completed</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="category_id" class="visually-hidden">Category</label>
                <select class="form-select" id="category_id" name="category_id">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if(Request::get('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="priority" class="visually-hidden">Priority</label>
                <select class="form-select" id="priority" name="priority">
                    <option value="">Select Priority</option>
                    <option value="low" @if(Request::get('priority') == 'low') selected @endif>Low</option>
                    <option value="medium" @if(Request::get('priority') == 'medium') selected @endif>Medium</option>
                    <option value="high" @if(Request::get('priority') == 'high') selected @endif>High</option>
                </select>
            </div>
        </div>
    </form>

    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Category</th>                
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>
                        @php
                            $words = explode(' ', $task->description);
                            $truncatedDescription = implode(' ', array_slice($words, 0, 4));
                        @endphp
                        {{ $truncatedDescription }} @if (count($words) > 4) ... @endif
                    </td>
                    <td>{{ ucfirst($task->status) }}</td>
                    <td>{{ ucfirst($task->priority) }}</td>
                    <td>{{ $task->category->name ?? '' }}</td>
                    <td>
                        {{-- @can('view', $task) --}}
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-info">View</a>
                        {{-- @endcan --}}
                        {{-- @can('update', $task) --}}
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        {{-- @endcan --}}
                        {{-- @can('delete', $task) --}}
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                            </form>
                        {{-- @endcan --}}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">No tasks found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3 d-flex justify-content-end">
        {{ $tasks->appends(request()->except('page'))->links('tasks.pagi') }}
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterForm = document.getElementById('filter-form');
        const filterInputs = filterForm.querySelectorAll('input, select');

        filterInputs.forEach(input => {
            input.addEventListener('change', () => {
                filterForm.submit();
            });
        });

        const searchInput = document.getElementById('search');
        searchInput.addEventListener('input', () => {
            filterForm.submit();
        });
    });
</script>
@endsection
