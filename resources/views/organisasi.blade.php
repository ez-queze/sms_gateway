<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SMK PGRI 2 Denpasar</title>

        <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.guest-navigation')

            <div class="mx-5 mt-10">
                <div class="overflow-hidden p-4 m-auto mx-auto w-full max-w-7xl h-auto bg-white rounded-lg shadow-lg transition duration-500 ease-in-out transform cursor-pointer sm:px-6 lg:px-8 md:w-full hover:translate-y-5 hover:shadow-2xl">

                    <div class="flex justify-center p-5 bg-white">
                        <img src="{{ asset('img/organisasi.png') }}" md:w-auto width="75%" alt="logo ">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
