@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center align-items-center min-vh-100">

            <div class="col-md-5">

                <div class="card shadow forgot-card">

                    <div class="card-body p-5">

                        <!-- Icon -->
                        <div class="icon-box mb-4">
                            <i class="bi bi-shield-lock"></i>
                        </div>

                        <!-- Heading -->
                        <h2 class="text-center fw-bold mb-2">
                            Forgot Password?
                        </h2>

                        <p class="text-center text-muted mb-4">
                            Enter your registered email address or phone number
                            to receive a password reset link or OTP.
                        </p>

                        <!-- Form -->
                        <form action="/forgot-password" method="POST">

                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label">
                                    Email Address
                                </label>

                                <input type="email" name="email" class="form-control form-control-lg"
                                    placeholder="Enter your email">
                            </div>

                            <!-- OR Divider -->
                            <div class="text-center my-3">
                                <span class="text-muted">
                                    OR
                                </span>
                            </div>

                            <!-- Phone -->
                            <div class="mb-4">
                                <label class="form-label">
                                    Phone Number
                                </label>

                                <div class="input-group input-group-lg">

                                    <span class="input-group-text">
                                        +91
                                    </span>

                                    <input type="text" name="phone" class="form-control"
                                        placeholder="Enter phone number">

                                </div>
                            </div>

                            <!-- Button -->
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                Send Reset Link / OTP
                            </button>

                        </form>

                        <!-- Back -->
                        <div class="text-center mt-4">

                            <a href="{{ route('login') }}" class="text-decoration-none">
                                <i class="bi bi-arrow-left"></i>
                                Back to Login
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
