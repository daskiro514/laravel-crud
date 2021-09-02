<!DOCTYPE html>
<html>

<head>
    <title>Paypal Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container">
            <a class="text-light navbar-brand mr-auto" href="#">Paypal Integration Test</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="text-light nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-light nav-link" href="{{ route('register-user') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="text-light nav-link" href="{{ route('signout') }}">Logout</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    @guest
        @yield('content')
    @else
        <div class="container-fluid">
            <div class="row">
                <div class="col-2 p-2" style="background-color: #3f51b5; min-height: 100vh;">
                    @include('components.sidebar')
                </div>
                <div class="col-10">
                    @yield('content')
                </div>
            </div>
        </div>
    @endguest

</body>

</html>
