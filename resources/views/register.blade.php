@extends('layouts')

@section('title', 'Register')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-4" style="width: 400px; border-radius: 10px;">
        <h3 class="text-center mb-4">Register</h3>
        <form method="post" action="{{route("register.post")}}">
            @csrf
            @method('post')
            <div class="form-group mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" required>
            </div>
            <div class="form-group mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Register</button>
            <div class="text-center mt-3">
                <a href="#" class="text-muted">Forgot your password?</a>
            </div>
        </form>
    </div>
</div>
@endsection
