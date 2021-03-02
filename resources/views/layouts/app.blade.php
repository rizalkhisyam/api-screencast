<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title ?? config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <div class="flex">
            @include('layouts.sidebar')
            <!-- Page Heading -->

            <!-- Page Content -->
            <main class="w-4/5 p-5">
                @isset($header)
                <h1 class="font-lig mb-5 text-2xl">{{$header}}</h1>
                @endisset

                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>