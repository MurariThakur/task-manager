
@extends('layouts.appp')

@section('content')
    <div class="container">
        <h2>Category Details</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $category->name }}</h5>
                <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
