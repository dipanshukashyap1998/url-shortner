@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Add Users</div>
        <div class="card-body">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">
                            Name
                        </label>

                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter name"
                            value="{{ old('name') }}">

                        @error('name')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">
                            Email
                        </label>

                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email"
                            value="{{ old('email') }}">

                        @error('email')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <select class="form-select" aria-label="Default select example" name="role">
                            <option disabled>Open this select menu</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">
                                    {{ ucfirst($role->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <input type="hidden" name="created_by" value={{ Auth::user->id }}>

                <button type="submit" class="btn btn-secondary">
                    Submit
                </button>
            </form>
        </div>
    </div>
@endsection
