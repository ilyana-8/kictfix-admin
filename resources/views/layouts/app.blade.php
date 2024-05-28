<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background-color: #eee;">
    <div id="app">
        <div class="container-fluid">
            <div class="row flex-nowrap">

                <!-- Sidebar -->
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" style="background-color: #051744">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <div class="mb-4 mx-auto">
                            <a href="{{ route('dashboard') }}" class="d-block my-3 text-decoration-none">
                                <img src="{{ asset('img/KICTFix-logo.png') }}" alt="KICTFix Logo" style="width: 200px;">
                            </a>
                        </div>

                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <li>
                                <a href="{{ route('dashboard') }}" class="nav-link px-0 align-middle link-light">
                                    <i class="fs-4 bi-speedometer2"></i><span class="ms-3 d-none d-sm-inline">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.index') }}" class="nav-link px-0 align-middle link-light">
                                    <i class="fs-4 bi bi-people"></i><span class="ms-3 d-none d-sm-inline">Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('technician.index') }}" class="nav-link px-0 align-middle link-light">
                                    <i class="fs-4 bi bi-person-gear"></i><span class="ms-3 d-none d-sm-inline">Technicians</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('report.index') }}" class="nav-link px-0 align-middle link-light">
                                    <i class="fs-4 bi bi-exclamation-triangle"></i><span class="ms-3 d-none d-sm-inline">Reports</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col pb-3">
                    <!-- Navbar -->
                    <nav class="row navbar navbar-expand-md navbar-light bg-light border-bottom">
                        <div class="container">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav me-auto"></ul>

                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fs-3 bi bi-person-circle align-middle me-2"></i>
                                            <span>{{ Auth::user()->name }}</span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('profile.show', Auth::id()) }}">Profile</a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <main class="py-4">
                        <div class="container">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fs-5 bi bi-check-circle-fill align-middle me-2"></i>
                                    <span> {{ session('success') }}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fs-5 bi bi-exclamation-circle-fill align-middle me-2"></i>
                                    <span> {{ session('error') }}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>

                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
