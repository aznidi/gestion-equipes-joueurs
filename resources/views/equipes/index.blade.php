@extends('layouts.app')

@section('content')

<div class="mx-auto rounded-lg p-5 m-5">
    <div class="flex items-center justify-between">
        <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl">
            La Liste des
            <mark class="px-2 text-white bg-blue-600 rounded">Equipes</mark> 2024
        </h1>
        <a href="{{route('equipes.create')}}" class="rounded-md bg-blue-600 py-2 px-4 text-sm text-white hover:bg-blue-700">
            Ajouter Une Équipe
        </a>
    </div>

    <div class="relative z-0 sm:rounded-lg mt-3">
        <table class="w-full text-sm text-left text-gray-900 bg-white">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3">ID Équipe</th>
                    <th scope="col" class="px-6 py-3">Nom</th>
                    <th scope="col" class="px-6 py-3">Pays</th>
                    <th scope="col" class="px-6 py-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_teams as $team)
                    <tr class="bg-white border-b hover:bg-gray-100">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900">{{ $team['id'] }}</th>
                        <td class="px-6 py-4">{{ $team['nom'] }}</td>
                        <td class="px-6 py-4">{{ $team['pays'] }}</td>
                        <td class="px-6 py-4 justify-evenly flex ">
                            <a href="{{ route('equipes.show', $team['id']) }}" class="text-blue-400 hover:underline">Afficher</a>
                            <a href="{{ route('equipes.edit', $team['id']) }}" class="text-blue-600 hover:underline">Modifier</a>
                            <form action="{{ route('equipes.destroy', $team['id']) }}" method="POST" class="inline" onsubmit="return confirm('Voulez-vous vraiment supprimer cette équipe ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
