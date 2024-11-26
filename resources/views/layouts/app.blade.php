<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Poppins" rel="stylesheet">

    <!-- Vite Script -->
    @vite('resources/css/app.css')

    <!-- Tailwind Custom Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Navbar with gradient background -->
        <nav class="bg-gradient-to-r from-blue-500 to-blue-800 shadow-md text-white">
            <div class="container mx-auto px-4 py-3 flex justify-between items-center">
                <!-- Logo -->
                <a class="text-xl font-bold" href="{{ url('/') }}">
                    @if (!Auth::check())
                        Gestion des devoirs .
                    @endif
                    @if (Auth::check())
                        {{Auth::user()->name}}
                    @endif

                </a>

                <!-- Navigation Links -->
                @auth
                    <div class="hidden md:flex space-x-8"> <!-- Espace augmenté ici -->
                        <!-- Dropdown Devoirs -->
                        <div class="relative group">
                            <a class="font-medium cursor-pointer hover:text-blue-300">Devoirs</a>
                            <div class="absolute hidden group-hover:block bg-white text-gray-800 shadow-lg rounded-md mt-2 w-40">
                                <a class="block hover:bg-gray-200 py-2 px-4" href="{{ route('imc') }}">Calcul IMC</a>
                                <a class="block hover:bg-gray-200 py-2 px-4" href="{{ route('pret') }}">Cacule pret</a>
                                <a class="block hover:bg-gray-200 py-2 px-4" href="{{ route('convertisseur') }}">Convertisseur</a>
                                <a class="block hover:bg-gray-200 py-2 px-4" href="{{ route('reservation') }}">Reservation</a>
                                <a class="block hover:bg-gray-200 py-2 px-4" href="{{ route('equipes.index') }}">Crud Equipes</a>
                            </div>
                        </div>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="font-medium text-red-400 hover:text-red-600">
                                Logout
                            </button>
                        </form>

                    </div>

                    <!-- Mobile Menu Button -->
                    <button id="menu-btn" class="md:hidden focus:outline-none">
                        <svg id="menu-icon" class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path id="menu-open" class="block" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                            <path id="menu-close" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
            </div>
            @endauth


                <!-- Mobile Menu -->
            @auth
            <div id="mobile-menu" class="hidden md:hidden bg-gray-50">
                <div class="py-2 px-4">
                    <div class="font-medium text-gray-800">Devoirs</div>
                    <a class="block text-gray-600 hover:bg-gray-200 py-2 px-4" href="{{ route('imc') }}">Calcul IMC</a>
                    <a class="block text-gray-600 hover:bg-gray-200 py-2 px-4" href="{{ route('pret') }}">Cacule pret</a>
                    <a class="block text-gray-600 hover:bg-gray-200 py-2 px-4" href="{{ route('convertisseur') }}">Convertisseur</a>
                    <a class="block text-gray-600 hover:bg-gray-200 py-2 px-4" href="{{ route('reservation') }}">Reservation</a>
                    <a class="block text-gray-600 hover:bg-gray-200 py-2 px-4" href="{{ route('equipes.index') }}">Crud Equipes</a>

                </div>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="font-medium text-red-400 hover:text-red-600">
                        Logout
                    </button>
                </form>
            </div>

            @endauth

            @guest
                <div class="hidden md:flex space-x-8"> <!-- Espace augmenté ici -->
                        <!-- Dropdown Devoirs -->
                        <div class="relative group">
                        <a class="font-medium hover:text-blue-300" href="{{ url('/login') }}">Login</a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button id="menu-btn" class="md:hidden focus:outline-none">
                        <svg id="menu-icon" class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path id="menu-open" class="block" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                            <path id="menu-close" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                    <!-- Mobile Menu -->
                <div id="mobile-menu" class="hidden md:hidden bg-gray-50">
                    <a class="block text-gray-600 hover:bg-gray-200 py-2 px-4" href="{{ url('/login') }}">Login</a>
                </div>
            @endguest

        </nav>

        <!-- Main Content -->
        <main class="p-4">
            @yield('content')
        </main>
    </div>

    <!-- JavaScript for Mobile Menu Toggle -->
    <script>
        document.getElementById('menu-btn').addEventListener('click', function () {
            const mobileMenu = document.getElementById('mobile-menu');
            const menuOpenIcon = document.getElementById('menu-open');
            const menuCloseIcon = document.getElementById('menu-close');
            mobileMenu.classList.toggle('hidden');
            menuOpenIcon.classList.toggle('hidden');
            menuCloseIcon.classList.toggle('hidden');
        });
    </script>
</body>
</html>
