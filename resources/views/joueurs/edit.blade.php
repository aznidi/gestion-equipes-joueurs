@extends('layouts.app')

@section('content')
<div class="container mx-auto p-5">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-extrabold text-gray-900 md:text-3xl lg:text-4xl">
            Modifer <mark class="px-2 text-white bg-blue-600 rounded">{{ $player['nom'] ?? 'Indisponible' }}</mark>
        </h1>
        <a href="{{ route('joueurs.index') }}" class="rounded-md bg-red-600 py-2 px-4 text-white text-sm hover:bg-red-700 focus:outline-none">
            Retour
        </a>
    </div>

    <form action="{{ route('joueurs.update', $player['id'] ?? -1) }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6 bg-white rounded-lg shadow-lg">
        @csrf
        @method('PUT')

        <!-- Left Section (Placeholder Image) -->
        <div class="flex justify-center items-center border-2 border-blue-500 rounded-lg p-4">
            <!-- Placeholder Image -->
            <img src="https://via.placeholder.com/600x400" alt="Image de l'équipe" class="w-full h-full object-cover rounded-lg" />
        </div>

        <!-- Right Section (Form Inputs) -->
        <div>
            <div class="mb-4">
                <label for="nom" class="block text-gray-700 font-medium mb-2">Nom Equipe :</label>
                <input type="text" id="nom" name="nom" value="{{ $player['nom'] ?? 'Indisponible' }}" placeholder="Nom du joueur" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('nom_equipe') border-red-500 @enderror">
                @error('nom')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="date_naissance" class="block text-gray-700 font-medium mb-2">Date de naissance:</label>
                <input type="date" id="date_naissance" name="date_naissance" value="{{ $player['date_naissance'] ?? 'Indisponible' }}" placeholder="Date de naissance su joueur" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('pays_equipe') border-red-500 @enderror">
                @error('date_naissance')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="nationalite" class="block text-gray-700 font-medium mb-2">Nationalite :</label>
                <input type="text" id="nationalite" name="nationalite" value="{{ $player['nationalite'] ?? 'Indisponible' }}" placeholder="Nationalite du Joueur" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('fondation') border-red-500 @enderror">
                @error('nationalite')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="date_contrat" class="block text-gray-700 font-medium mb-2">Date de contrat :</label>
                <input type="date" id="date_contrat" name="date_contrat" value="{{ $player['date_contrat'] ?? 'Indisponible'}}" placeholder="Date de Contrat" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('titres') border-red-500 @enderror">
                @error('date_contrat')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <select id="equipe_id" name="equipe_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="" disabled>-- Sélectionnez une équipe --</option>
                @foreach($all_teams as $team)
                    <option value="{{ $team->id }}" {{ $player['equipe_id'] == $team->id ? 'selected' : '' }}>
                        {{ $team->nom }}
                    </option>
                @endforeach
            </select>


            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Modifer
            </button>
        </div>
    </form>
</div>
@endsection
