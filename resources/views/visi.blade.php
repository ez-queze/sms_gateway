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

                    <div class="p-6 bg-white">
                        <br>
                        <h2 class="text-center">Visi</h2>
                        <br>
                        <h4  class="text-center fst-italic">“Terwujudnya Sikap dan Prilaku Kewirahusahaan Melalui Penerapan Pola Manajemen Partisipatif yang Berpotensi Pada Pandayaguna <br> Teknologi Informasi yang Berakses Global“</h4>
                        <br>
                    <div class="border border-bottom border-light"></div>

                    <br>
                    <h2 class="container text-center">Misi </h2>
                    <br>
                        <p class="col-md-10 ms-auto fs-6" >
                            1.  Menumbuhkembangkan sikap kewirahusaan setiap tamatan sebagai cerminan penguasaan kompetensi untuk bekal hidup secara mandiri. <br>
                            2.  Meningkatkan kompetensi pendidikan dan tenaga kependidikan, serta seluruh peserta didik baik secara internal maupun eksternal. <br>
                            3.  Menumbuhkan penggunaan teknologi informasi yang berakses global.<br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
