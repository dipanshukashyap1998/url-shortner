@extends('layouts.app')
here
@section('content')
    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card shadow">

                    <div class="card-header">
                        <h4 class="mb-0">
                            Company Create Form
                        </h4>
                    </div>

                    <div class="card-body">

                        <form action="" method="POST">

                            @csrf

                            <!-- Name -->
                            <div class="mb-3">

                                <label class="form-label">
                                    Name
                                </label>

                                <input type="text" name="name" class="form-control" placeholder="Enter full name">

                            </div>

                            <!-- Email -->
                            <div class="mb-3">

                                <label class="form-label">
                                    Email Address
                                </label>

                                <input type="email" name="email" class="form-control" placeholder="Enter email">

                            </div>

                            <!-- Phone -->
                            <div class="mb-3">

                                <label class="form-label">
                                    Phone Number
                                </label>

                                <input type="text" name="phone" class="form-control" placeholder="Enter phone number">

                            </div>

                            <!-- Address -->
                            <div class="mb-3">

                                <label class="form-label">
                                    Address
                                </label>

                                <textarea name="address" class="form-control" rows="3" placeholder="Enter address"></textarea>

                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">

                                Submit

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
