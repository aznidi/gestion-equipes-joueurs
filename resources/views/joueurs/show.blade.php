@extends('layouts.app')

@section('content')

    <div class="mx-auto rounded-lg p-5 m-5">
        <div class="flex items-center justify-between ">
            <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight
            text-gray-900 md:text-3xl lg:text-4xl dark:text-dark">
                Informations Sur
                    <mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">
                        {{ $player['nom'] ?? 'Indisponible' }}</mark>

            </h1>
            <a href="{{route('joueurs.index')}}" class="rounded-md bg-red-600 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-red-700 focus:shadow-none active:bg-red-700 hover:bg-red-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2">
                Retour
            </a>
        </div>

        <div class="relative z-0 sm:rounded-lg mt-3">
            <table class="w-full text-sm text-left text-gray-900 bg-white">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID Joueur</th>
                        <th scope="col" class="px-6 py-3">Nom</th>
                        <th scope="col" class="px-6 py-3">Date de Naissance</th>
                        <th scope="col" class="px-6 py-3">Nationalité</th>
                        <th scope="col" class="px-6 py-3">Contrat Avec</th>
                        <th scope="col" class="px-6 py-3">Date de contrat</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($player['id'])
                        <tr class="bg-white border-b hover:bg-gray-100">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900">{{ $player['id'] }}</th>
                            <td class="px-6 py-4">{{ $player['nom'] }}</td>
                            <td class="px-6 py-4">{{ $player['date_naissance'] }}</td>
                            <td class="px-6 py-4">{{ $player['nationalite'] }}</td>
                            <td class="px-6 py-4">{{ $player['equipe']['nom'] }}</td>
                            <td class="px-6 py-4">{{ $player['date_contrat'] }}</td>
                        </tr>
                    @else
                        <tr class="bg-white border-b hover:bg-gray-100">
                            <!-- Cette cellule va s'étendre sur toutes les colonnes de la table -->
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">Il n'y a pas de joueurs disponibles.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>







        <div class="flex items-center justify-between mt-10 ">
            <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight
            text-gray-900 md:text-3xl lg:text-4xl dark:text-dark">
                Informations Sur
                    <mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">
                        {{ $player['equipe']['nom'] ?? 'Indisponible' }}</mark>

            </h1>
        </div>

        <div class="relative z-0 sm:rounded-lg mt-3">
            <table class="w-full text-sm text-left text-gray-900 bg-white">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID Equipe</th>
                        <th scope="col" class="px-6 py-3">Nom Equipe</th>
                        <th scope="col" class="px-6 py-3">Pays</th>
                        <th scope="col" class="px-6 py-3">Fondation</th>
                        <th scope="col" class="px-6 py-3">Stade</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($player['equipe']['id'])
                        <tr class="bg-white border-b hover:bg-gray-100">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900">{{ $player['equipe']['id'] }}</th>
                            <td class="px-6 py-4">{{ $player['equipe']['nom'] }}</td>
                            <td class="px-6 py-4">{{ $player['equipe']['pays'] }}</td>
                            <td class="px-6 py-4">{{ $player['equipe']['fondation'] }}</td>
                            <td class="px-6 py-4">{{ $player['equipe']['stade'] }}</td>
                        </tr>
                    @else
                        <tr class="bg-white border-b hover:bg-gray-100">
                            <!-- Cette cellule va s'étendre sur toutes les colonnes de la table -->
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">Il n'y a pas d'equipes disponibles.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>


    </div>

@endsection
