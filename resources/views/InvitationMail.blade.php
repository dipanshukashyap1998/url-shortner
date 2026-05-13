<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accept Invitation</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .invite-card {
            max-width: 500px;
            border: none;
            border-radius: 16px;
        }

        .company-logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="row justify-content-center align-items-center min-vh-100">

            <div class="col-md-6">

                <div class="card shadow invite-card">

                    <div class="card-body p-5 text-center">

                        <!-- Logo -->
                        <h1>Url Shortner</h1>

                        <!-- Heading -->
                        <h2 class="fw-bold mb-3">
                            You're Invited!
                        </h2>

                        <!-- Description -->
                        <p class="text-muted mb-4">
                            You have been invited to join
                            <strong>Url Shortner</strong>
                            as a
                            <strong>Team Member</strong>.
                        </p>

                        <!-- Invitation Details -->
                        <div class="bg-light rounded p-3 mb-4 text-start">

                            <div class="mb-2">
                                <strong>Email:</strong>
                                {{ $email ?? '' }}
                            </div>

                            <div class="mb-2">
                                <strong>Invited By:</strong>
                                {{ $inviterName ?? '' }}
                            </div>

                            <div>
                                <strong>Role:</strong>
                                {{ $role ?? '' }}
                            </div>

                        </div>

                        <!-- Accept Form -->
                        <form action="{{ route('invitationAccept') }}" method="POST">
                            @csrf
                            <!-- Laravel CSRF -->
                            <input type="hidden" name="name">

                            <!-- Invitation Token -->
                            <input type="hidden" name="email">

                            <button type="submit" class="btn btn-primary w-100 py-2">
                                Accept Invitation
                            </button>

                        </form>

                        <!-- Optional -->
                        <p class="text-muted small mt-4 mb-0">
                            If you were not expecting this invitation,
                            you can safely ignore this email.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>
