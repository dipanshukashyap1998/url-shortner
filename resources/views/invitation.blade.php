@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Invite New Client</div>

                    <div class="card-body">
                        <form action="{{ route('sendInvitation') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                    <span class="text-danger" id="emailError">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="col-md-6">
                                    <label for="company" class="form-label">Client Name</label>
                                    <input type="text" class="form-control" id="company" name="client"
                                        placeholder="Enter client name">
                                    <span class="text-danger" id="companyError">{{ $errors->first('company_id') }}</span>
                                </div>
                            </div>
                            <button class="btn btn-secondary my-2" id="sendInviteButton">Send Invite</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
