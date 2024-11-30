@extends('layouts.app')

@section('content')

<div class="mx-auto rounded-lg p-5 m-5">
    <div class="flex items-center justify-between">
        <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl">
            La Liste des
            <mark class="px-2 text-white bg-blue-600 rounded">Joueurs</mark> {{now()->year}}
        </h1>
        <a href="{{route('joueurs.create')}}" class="rounded-md bg-blue-600 py-2 px-4 text-sm text-white hover:bg-blue-700">
            Ajouter Un Joueur
        </a>
    </div>

    <div class="relative z-0 sm:rounded-lg mt-3">
        <table class="w-full text-sm text-left text-gray-900 bg-white">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3">ID Joueurs</th>
                    <th scope="col" class="px-6 py-3">Nom</th>
                    <th scope="col" class="px-6 py-3">Equipe</th>
                    <th scope="col" class="px-6 py-3">Date Contrat</th>
                    <th scope="col" class="px-6 py-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($all_players) > 0)
                    @foreach ($all_players as $player)
                        <tr class="bg-white border-b hover:bg-gray-100">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900">{{ $player['id'] }}</th>
                            <td class="px-6 py-4">{{ $player['nom'] }}</td>
                            <td class="px-6 py-4">{{ $player['equipe']['nom'] }}</td>
                            <td class="px-6 py-4">{{ $player['date_contrat'] }}</td>
                            <td class="px-6 py-4 justify-evenly flex ">
                                <a href="{{ route('joueurs.show', $player['id']) }}" class="text-blue-400 hover:underline">Afficher</a>
                                <a href="{{ route('joueurs.edit', $player['id']) }}" class="text-blue-600 hover:underline">Modifier</a>
                                <form action="{{ route('joueurs.destroy', $player['id']) }}" method="POST" class="inline" onsubmit="return confirm('Voulez-vous vraiment supprimer cette équipe ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="bg-white border-b hover:bg-gray-100">
                        <!-- Cette cellule va s'étendre sur toutes les colonnes de la table -->
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Il n'y a pas des joueurs disponibles.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection
