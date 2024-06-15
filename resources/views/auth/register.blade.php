@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-4" style="width: 100%; max-width: 400px;">
        <h2 class="text-center mb-4">Register</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control" required>
                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password')">
                        <i id="password-toggle-icon" class="fas fa-eye-slash"></i>
                    </button>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="password_confirmation">Confirm Password</label>
                <div class="input-group">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password_confirmation')">
                        <i id="password_confirmation-toggle-icon" class="fas fa-eye-slash"></i>
                    </button>
                </div>
            </div>
            <button type="submit" class="btn  btn-primary w-100">Register</button>
            <div class="text-center mt-3">
                <a href="{{ route('login') }}">Already have an account? Login</a>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePassword(inputId) {
    var passwordInput = document.getElementById(inputId);
    var passwordToggleIcon = document.getElementById(`${inputId}-toggle-icon`);
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        passwordToggleIcon.classList.remove("fa-eye-slash");
        passwordToggleIcon.classList.add("fa-eye");
        
    } else {
        passwordInput.type = "password";
        passwordToggleIcon.classList.remove("fa-eye");
        passwordToggleIcon.classList.add("fa-eye-slash");
    }
}
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   
@endsection
