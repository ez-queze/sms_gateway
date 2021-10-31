<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-18">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center flex-shrink-0">
                    <a href="{{ route('welcome') }}">
                        <img style="-webkit-filter: drop-shadow(0px 0px 1px #222222); filter: drop-shadow(0px 0px 1px #222222);" src="{{ asset('img/logo.png') }}" width="75vw" alt="logo">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('visi')" :active="request()->routeIs('visi')">
                        {{ __('Visi & Misi') }}
                    </x-nav-link>

                    <x-nav-link :href="route('organisasi')" :active="request()->routeIs('organisasi')">
                        {{ __('Struktur Organisasi') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <a href="{{ route('login') }}" class="flex items-center mr-3 text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                    <div>Login</div>
                </a>
                {{-- <a href="{{ route('register') }}" class="flex items-center text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                    <div>Register</div>
                </a> --}}
            </div>
        </div>
    </div>
</nav>
