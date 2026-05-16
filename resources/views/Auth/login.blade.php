@extends('layouts.auth')

@section('content')
    <div class="container bg-gradient d-flex align-items-center justify-content-center" style="min-height: 100vh">
        <div class="card shadow-lg p-4" style="width: 400px">
            <form action="{{ route('authenticate') }}" method="POST">
                @csrf
                <div class="text-center mb-4">
                    <h1 class="display-4">Sign in</h1>
                    <p class="lead">Welcome back! Please enter your credentials to sign in.</p>
                </div>

                <!-- Email input -->
                <div class="mb-4">
                    <input type="email" id="form2Example1" class="form-control" name="email" />
                    <label class="form-label" for="form2Example1">
                        Email address
                    </label>
                </div>

                <!-- Password input -->
                <div class="mb-4">
                    <input type="password" id="form2Example2" class="form-control" name="password" />
                    <label class="form-label" for="form2Example2">
                        Password
                    </label>
                </div>

                <!-- Remember me -->
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rememberMe" name="remember" />

                            <label class="form-check-label" for="rememberMe">
                                Remember me
                            </label>
                        </div>
                    </div>

                    <div class="col">
                        <a href="{{route('forgetPassword')}}">Forgot password?</a>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary w-100 mb-4">
                    Sign in
                </button>

                <!-- Register link -->
                <div class="text-center">
                    <p class="mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-decoration-underline">Register here</a></p>
                </div>

            </form>
        </div>
    </div>
@endsection
