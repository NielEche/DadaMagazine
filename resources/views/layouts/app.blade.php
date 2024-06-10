<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://res.cloudinary.com/dwzlhkeal/image/upload/v1696171326/DADAMAGAZINELOGO_iqqxeo.svg" rel="icon">
        <meta name="author" content="Dada Magazine">
        <meta name="keywords" content="Dada magazine black art curating">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Dada Magazine">
        <title>Dada Magazine </title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="{{ asset('appfiles/css/style.css') }}" rel="stylesheet">

        <!-- Favicon -->
        <link rel="icon" href="https://res.cloudinary.com/dwzlhkeal/image/upload/v1696171326/DADAMAGAZINELOGO_iqqxeo.svg" type="image/x-icon">

        <!-- Scripts -->
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <!-- GreenSock Animation Platform (GSAP) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>


        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="font-sans antialiased bg-SelectColor">
         <!--  <style>
            body {
                margin: 0;
                padding: 0;
                overflow: hidden;
            }

            .holding-page {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 1000;
                padding: 50px;

            }

            .holding-page img {
                max-width: 100%;
                max-height: 100%;
                z-index: 1000;
             
            }
            .holding-page h3 {
                z-index: 1000;
                padding-top: 20px;
            }

            @media (max-width: 768px) {
                .holding-page {
                    flex-direction: column;
                    text-align: center; /* Optional: Center-align content vertically for small screens */
                }
            }

        </style>
        <div class="holding-page bg-SelectColor lg:flex-row flex-column">
            <img style=" padding: 20px;" src="https://res.cloudinary.com/nieleche/image/upload/v1696070928/qrmhqrqqajpy7hewbz4w.jpg" alt="Holding Image">
            <div style="padding: 30px; ">
                <img src="https://res.cloudinary.com/dwzlhkeal/image/upload/v1696171326/DADAMAGAZINELOGO_iqqxeo.svg" alt="DADA LOGO" style="width:100% !important;">
                <h3 class="MinionPro-Regular lg:text-6xl text-4xl leading-tight" >We're Updating, <br/> see you soon !</h3>
            </div>
        </div>-->

        <div class="min-h-screen bg-SelectColor wrap" id="wrap">
         
            <!-- Page Heading -->
            @if (isset($header))
                @include('partials.header')
            @endif

            <!-- Page Content -->
            <main  class="{{ Route::currentRouteName() === 'home' ? '' : 'mt-16' }}" style="{{ Route::currentRouteName() === 'storiesM.edit' ? 'margin-top: 0;' : '' }}">
                {{ $slot }}
            </main>

            @if (isset($header))
                @include('partials.footer')
            @endif
        </div>
        <script src="{{asset('appfiles/js/style.js') }}"></script>

        <div class="custom-cursor"></div>


    </body>
</html>
