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

    <!-- Custom CSS -->
    <style>
        .left-column {
            background-color: #051744;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .left-column img {
            max-width: 100%;
            height: auto;
        }

        .right-column {
            background-color: white;
            padding: 2rem;
        }
    </style>
</head>
<body style="background-color: #eee;">
    <div id="app">
        <div class="container">
            @yield('content')
        </div>
    </div>
</body>
