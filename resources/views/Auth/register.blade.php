@extends('layouts.auth')

@section('content')
    <div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
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
                    <label class="form-label" for="form2Example1">
                        Full Name
                    </label>
                    <input type="text" id="form2Example1" class="form-control" name="name" value="{{ old('name') }}"
                        required autofocus />
                    @error('name')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email input -->
                <div class="mb-4">
                    <label class="form-label" for="form2Example2">
                        Email address
                    </label>
                    <input type="email" id="form2Example2" class="form-control" name="email" value="{{ old('email') }}"
                        required />
                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password input -->
                <div class="mb-4">
                    <label class="form-label" for="form2Example3">
                        Password
                    </label>
                    <input type="password" id="form2Example3" class="form-control" name="password" required />
                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password input -->
                <div class="mb-4">
                    <label class="form-label" for="form2Example4">
                        Confirm Password
                    </label>
                    <input type="password" id="form2Example4" class="form-control" name="password_confirmation" required />
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
                <p class="mb-0">Already have an account? <a href="{{ route('login') }}"
                        class="text-decoration-underline">Login here</a></p>
            </div>
        </div>
    </div>
@endsection
