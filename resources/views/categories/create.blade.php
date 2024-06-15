
@extends('layouts.appp')

@section('content')
    <div class="container">
        <h2>Create Category</h2>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary me-2 mt-2">Cancel</a>
            <button type="submit" class="btn btn-primary mt-2">Create</button>
        </form>
    </div>
@endsection
