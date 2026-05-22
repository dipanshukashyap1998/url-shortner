@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-secondary" id="addUserButton">Add User</button>
                </div>
            </div>
        </div>
        <div class="card my-2">
            <div class="card-header">Users</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Sr No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Company</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">No companies found.</td>
                            </tr>
                        @endif
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name ?? ""}}</td>
                                <td>{{ $user->email ?? ""}}</td>
                                <td>{{ $user->company->name ?? ""}}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Edit</button>
                                    <button class="btn btn-sm btn-danger" @disabled(!$user->isSuperAdmin())>Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {

        document.getElementById('addUserButton').addEventListener('click', function() {
            window.location.href = "{{ route('user.create') }}"
        })

    });
</script>
