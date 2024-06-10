<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Dada Magazine') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="{{ asset('appfiles/css/style.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <style>
                @media screen and (min-width: 644px) {
                .onlgOnly {
                    width:90%;
                    float:right;
                }
                }
            </style>
            <!-- Page Heading -->
            @if (isset($header))
                @include('admin.partials.header')
            @endif

            <!-- Page Content -->
            <div class="onlgOnly">
                {{ $slot }}
            </div>

            @if (isset($header))
                @include('admin.partials.footer')
            @endif
        </div>
        <script src="{{asset('appfiles/js/style.js') }}"></script>
    </body>
</html>
