<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">

    <div class="min-h-screen bg-gray-100">

        <div class="md:flex md:flex-grow md:overflow-hidden">
            <div scroll-region="" class="md:flex-1">
                @include('layouts.navigation')
                <!-- Page Content -->
                <main class="px-4 py-8 md:p-12 md:overflow-y-auto">
                    {{ $slot }}
                </main>
            </div>
        </div>

    </div>
</body>

</html>