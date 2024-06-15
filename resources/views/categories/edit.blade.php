
@extends('layouts.appp')

@section('content')
    <div class="container">
        <h2>Edit Category</h2>
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
            </div>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary me-2 mt-2">Cancel</a>
            <button type="submit" class="btn btn-primary mt-2">Update</button>
        </form>
    </div>
@endsection
