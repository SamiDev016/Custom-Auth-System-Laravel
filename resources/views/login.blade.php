@extends('layouts')

@section('title', 'Login')

@section('content')
<div class="mt-5">
    @if ($errors->any())
        <div class="col-12">
            @foreach ($errors->all() as $error )
                <div class="alert-danger alert">
                    {{$error}}
                </div>
            @endforeach
        </div>
    @endif

    @if (session()->has('error'))
    <div class="alert-danger alert">
        {{session('error')}}
    </div>
    @endif

    @if (session()->has('success'))
    <div class="alert-success alert">
        {{session('success')}}
    </div>
    @endif

</div>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-4" style="width: 400px; border-radius: 10px;">
        <h3 class="text-center mb-4">Login</h3>
        <form method="post" accept="{{route("login.post")}}">
            @csrf
            @method('post')
            <div class="form-group mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <button type="submit" class="btn btn-success w-100">Login</button>
            <div class="text-center mt-3">
                <a href="#" class="text-muted">Forgot your password?</a>
            </div>
        </form>
    </div>
</div>
@endsection
