@extends('layouts.auth')

@section('content')
    <div class="container bg-gradient d-flex align-items-center justify-content-center" style="min-height: 100vh">
        <div class="card shadow-lg p-4" style="width: 400px">
            <form action="{{ route('register.perform') }}" method="POST">
                @csrf
                <div class="text-center mb-4">
                    <h1 class="display-4">Sign up</h1>
                    <p class="lead">Create your account to get started</p>
                </div>

                <!-- Name input -->
                <div class="mb-4">
                    <input type="text" id="form2Example1" class="form-control" name="name" value="{{ old('name') }}" required autofocus />
                    <label class="form-label" for="form2Example1">
                        Full Name
                    </label>
                    @error('name')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email input -->
                <div class="mb-4">
                    <input type="email" id="form2Example2" class="form-control" name="email" value="{{ old('email') }}" required />
                    <label class="form-label" for="form2Example2">
                        Email address
                    </label>
                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password input -->
                <div class="mb-4">
                    <input type="password" id="form2Example3" class="form-control" name="password" required />
                    <label class="form-label" for="form2Example3">
                        Password
                    </label>
                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password input -->
                <div class="mb-4">
                    <input type="password" id="form2Example4" class="form-control" name="password_confirmation" required />
                    <label class="form-label" for="form2Example4">
                        Confirm Password
                    </label>
                    @error('password_confirmation')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary w-100 mb-4">
                    Register
                </button>
            </form>

            <div class="text-center">
                <p class="mb-0">Already have an account? <a href="{{ route('login') }}" class="text-decoration-underline">Login here</a></p>
            </div>
        </div>
    </div>
@endsection