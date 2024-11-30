@extends('layouts.app')

@section('content')

    <div class="mx-auto rounded-lg p-5 m-5">
        <div class="flex items-center justify-between ">
            <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight
            text-gray-900 md:text-3xl lg:text-4xl dark:text-dark">
                Informations Sur
                    <mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">
                        {{ $team['nom'] ?? 'Indisponible' }}</mark>

            </h1>
            <a href="{{route('equipes.index')}}" class="rounded-md bg-red-600 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-red-700 focus:shadow-none active:bg-red-700 hover:bg-red-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2">
                Retour
            </a>
        </div>

        <div class="relative z-0 sm:rounded-lg mt-3">
            <table class="w-full text-sm text-left text-gray-900 bg-white">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID Équipe</th>
                        <th scope="col" class="px-6 py-3">Nom</th>
                        <th scope="col" class="px-6 py-3">Pays</th>
                        <th scope="col" class="px-6 py-3">Fondation</th>
                        <th scope="col" class="px-6 py-3">Titres</th>
                        <th scope="col" class="px-6 py-3">Stade</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($team['id'])
                        <tr class="bg-white border-b hover:bg-gray-100">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900">{{ $team['id'] }}</th>
                            <td class="px-6 py-4">{{ $team['nom'] }}</td>
                            <td class="px-6 py-4">{{ $team['pays'] }}</td>
                            <td class="px-6 py-4">{{ $team['fondation'] }}</td>
                            <td class="px-6 py-4">{{ $team['titres'] }}</td>
                            <td class="px-6 py-4">{{ $team['stade'] }}</td>
                        </tr>
                    @else
                        <tr class="bg-white border-b hover:bg-gray-100">
                            <!-- Cette cellule va s'étendre sur toutes les colonnes de la table -->
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">Il n'y a pas d'équipes disponibles.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>

@endsection
