@extends('layouts.app')

@section('content')

    <div class="mx-auto rounded-lg p-5 m-5">
        <div class="flex items-center justify-between ">
            <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight
            text-gray-900 md:text-3xl lg:text-4xl dark:text-dark">
                Informations Sur
                    <mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">
                        {{$team['nom']}}</mark>

            </h1>
            <a href="{{route('equipes.index')}}" class="rounded-md bg-red-600 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-red-700 focus:shadow-none active:bg-red-700 hover:bg-red-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2">
                Retour
            </a>
        </div>

        <div class="m-2 p-2 rounded-md mt-4 flex items-center justify-around">
            <!-- Section du nom de l'équipe -->
            <div class="flex items-center space-x-4">
                <!-- Nom complet de l'équipe -->
                <h1 class="mb-4 text-1xl font-extrabold leading-none tracking-tight text-gray-500 md:text-2xl lg:text-3xl dark:text-dark">
                    {{ $team['nom'] }}
                </h1>
            </div>

            <!-- Section de l'image/logo -->
            <div>
                <!-- L'image avec une taille ajustée -->
                <img src="{{ $team['logo_url'] }}" alt="Logo de l'équipe" class="w-20 h-20 object-contain">
            </div>
        </div>

        <div class="m-2 p-2 rounded-md mt-1 flex items-center justify-around">
            <div class="flex items-center space-x-4">
                <!-- Nom complet de l'équipe -->
                <h1 class="mb-4 text-l font-extrabold leading-none tracking-tight text-gray-900 md:text-xl lg:text-2xl dark:text-dark">
                    Pays
                </h1>
            </div>

            <div class="flex items-center space-x-4">
                <!-- Nom complet de l'équipe -->
                <h1 class="mb-4 text-l font-extrabold leading-none tracking-tight text-gray-500 md:text-xl lg:text-2xl dark:text-dark">
                    {{ $team['pays'] }}
                </h1>
            </div>
        </div>


        <div class="rounded-md mt-2 flex items-center justify-around">
            <div class="flex items-center space-x-4">
                <!-- Nom complet de l'équipe -->
                <h1 class="mb-4 text-l font-extrabold leading-none tracking-tight text-gray-900 md:text-xl lg:text-2xl dark:text-dark">
                    Fondation
                </h1>
            </div>

            <div class="flex items-center space-x-4">
                <!-- Nom complet de l'équipe -->
                <h1 class="mb-4 text-l font-extrabold leading-none tracking-tight text-gray-500 md:text-xl lg:text-2xl dark:text-dark">
                    {{ $team['fondation'] }}
                </h1>
            </div>
        </div>


        <div class="rounded-md mt-2 flex items-center justify-around">
            <div class="flex items-center space-x-4">
                <!-- Nom complet de l'équipe -->
                <h1 class="mb-4 text-l font-extrabold leading-none tracking-tight text-gray-900 md:text-xl lg:text-2xl dark:text-dark">
                    Titres
                </h1>
            </div>

            <div class="flex items-center space-x-4">
                <!-- Nom complet de l'équipe -->
                <h1 class="mb-4 text-l font-extrabold leading-none tracking-tight text-gray-500 md:text-xl lg:text-2xl dark:text-dark">
                    {{ $team['titres'] }}
                </h1>
            </div>
        </div>


        <div class=" rounded-md mt-2 flex items-center justify-around">
            <div class="flex items-center space-x-4">
                <!-- Nom complet de l'équipe -->
                <h1 class="mb-4 text-l font-extrabold leading-none tracking-tight text-gray-900 md:text-xl lg:text-2xl dark:text-dark">
                    Stade
                </h1>
            </div>

            <div class="flex items-center space-x-4">
                <!-- Nom complet de l'équipe -->
                <h1 class="mb-4 text-l font-extrabold leading-none tracking-tight text-gray-500 md:text-xl lg:text-2xl dark:text-dark">
                    {{ $team['stade'] }}
                </h1>
            </div>
        </div>



    </div>

@endsection
