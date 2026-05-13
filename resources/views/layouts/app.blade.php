<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Laravel App</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="min-vh-100 d-flex flex-column">

        <!-- Navbar -->
        @include('partials.navbar')

        <!-- Sidebar + Content -->
        <div class="d-flex flex-grow-1">

            <!-- Sidebar -->
            @include('partials.sidebar')

            <!-- Main Content -->
            <main class="flex-grow-1 p-4">

                @yield('content')

            </main>

        </div>

        <!-- Footer -->
        @include('partials.footer')

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')

</body>

</html>
