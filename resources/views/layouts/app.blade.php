<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gestion des equipes') }}</title>

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

        .navbar-link:hover {

            transition: background-color 0.3s ease;
        }

        .navbar-mobile-menu {
            transition: transform 0.3s ease-out;
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
                    Gestion des Equipes
                </a>

                <!-- Navigation Links -->
                <div class="hidden md:flex space-x-8 items-center">
                    <a class="navbar-link py-2 px-4 hover:text-gray-300 rounded-md hover:bg-blue-800" href="{{ route('home') }}">Acceuil</a>
                    <a class="navbar-link py-2 px-4 hover:text-gray-300 rounded-md hover:bg-blue-800" href="{{ route('equipes.index') }}">Gestion des Equipes</a>
                    <a class="navbar-link py-2 px-4 hover:text-gray-300 rounded-md hover:bg-blue-800" href="{{ route('joueurs.index') }}">Gestion des Joueurs</a>
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
            <div id="mobile-menu" class="navbar-mobile-menu hidden md:hidden bg-gray-50 transition-transform transform -translate-y-4">
                <div class="py-2 px-4">
                    <a class="navbar-link block py-2 px-4 text-gray-600 hover:bg-gray-200" href="{{ route('home') }}">Acceuil</a>
                    <a class="navbar-link block py-2 px-4 text-gray-600 hover:bg-gray-200" href="{{ route('equipes.index') }}">Gestion des Equipes</a>
                    <a class="navbar-link block py-2 px-4 text-gray-600 hover:bg-gray-200" href="{{ route('joueurs.index') }}">Gestion des Joueurs</a>
                </div>
            </div>
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

            // Toggle the visibility of the mobile menu
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('transform');
            mobileMenu.classList.toggle('translate-y-0'); // Slide in from the top

            // Toggle icons
            menuOpenIcon.classList.toggle('hidden');
            menuCloseIcon.classList.toggle('hidden');
        });
    </script>
</body>
</html>
