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

        <!-- This is an example component -->
        <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="relative rounded-lg flex flex-col md:flex-row items-center md:shadow-xl md:h-72 mx-2">

                <div class="z-0 order-1 md:order-2 relative w-full md:w-2/5 h-80 md:h-full overflow-hidden rounded-lg md:rounded-none md:rounded-r-lg">
                    <div class="absolute inset-0 w-full h-full object-fill object-center bg-blue-400 bg-opacity-30 bg-cover bg-bottom" style="background-image: url( img/gambar1.JPEG); background-blend-mode: multiply;"></div>
                    <div class="md:hidden absolute inset-0 h-full p-6 pb-6 flex flex-col-reverse justify-start items-start bg-gradient-to-b from-transparent via-transparent to-gray-900">
                        <h3 class="w-full font-bold text-2xl text-white leading-tight mb-2">HOTEL AMANEE</h3>
                        <h4 class="w-full text-xl text-gray-100 leading-tight">Bienvenido a</h4>
                    </div>
                    <svg class="hidden md:block absolute inset-y-0 h-full w-24 fill-current text-white -ml-12" viewBox="0 0 100 100" preserveAspectRatio="none">
                        <polygon points="50,0 100,0 50,100 0,100" />
                    </svg>
                </div>

                <div class="z-10 order-2 md:order-1 w-full h-full md:w-3/5 flex items-center -mt-6 md:mt-0">
                    <div class="p-8 md:pr-18 md:pl-14 md:py-12 mx-2 md:mx-0 h-full bg-white rounded-lg md:rounded-none md:rounded-l-lg shadow-xl md:shadow-none">
                        <h4 class="hidden md:block text-xl text-gray-400">Selamat Datang !</h4><br>
                        <h3 class="hidden md:block font-bold text-2xl text-gray-700">SISTEM BIMBINGAN KONSELING</h3>
                        <p class="text-gray-600 text-justify"> Membantu para peserta didik untuk memahami dirinya dan lingkungan sekitarnya agar dapat mengembangkan potensi dirinya secara optimal dan menyesuaikan diri dengan lingkungannya secara dinamis dan konstruktif.</p>

                    </div>
                </div>

            </div>
        </div>
        </div>
        </div>


    </body>
</html>
