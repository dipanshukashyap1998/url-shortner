@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-secondary" id="inviteButton">Invite</button>
                </div>
                <div class="card">
                    <div class="card-header">Clients</div>
                    <div class="card-body">
                        <table class="table table-bordered border-secondary">
                            <thead>
                                <tr>
                                    <th scope="col">SrNo.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($companies->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center">No companies found.</td>
                                    </tr>
                                @endif
                                @foreach ($companies as $company)
                                    <tr>
                                        <th scope="row">{{ $company->id }}</th>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->phone }}</td>
                                        <td>{{ $company->address }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary">Edit</button>
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 my-1 justify-content-start">
                        <span>Showing {{ $companies->firstItem() }} to {{ $companies->lastItem() }} of
                            {{ $companies->total() }} entries</span>
                        <button class="btn btn-secondary" id="viewallbutton" @disabled($companies->isEmpty())>View All</button>
                    </div>
                    <div class="col-md-6 my-1 d-flex justify-content-end">
                        <button id="nextButton" class="btn btn-secondary mx-2" @disabled($companies->isEmpty())>Next</button>
                        <button id="previousButton" class="btn btn-secondary" @disabled($companies->isEmpty())>Previous</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {

        document.getElementById('nextButton').addEventListener('click', function() {
            window.location.href = "{{ $companies->nextPageUrl() }}";
        });

        document.getElementById('previousButton').addEventListener('click', function() {
            window.location.href = "{{ $companies->previousPageUrl() }}";
        });

        document.getElementById('inviteButton').addEventListener('click', function() {
            window.location.href = "{{ route('invite') }}";
        });

        document.getElementById('viewallbutton').addEventListener('click', function() {
            window.location.href = "{{ route('company.index', ['view' => 'all']) }}";
        });
    });
</script>
