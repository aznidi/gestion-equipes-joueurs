@extends('layouts.app')

@section('content')
<div class="container mx-auto p-5">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-extrabold text-gray-900 md:text-3xl lg:text-4xl">
            Ajouter Un <mark class="px-2 text-white bg-blue-600 rounded">Equipe</mark>
        </h1>
        <a href="{{ route('equipes.index') }}" class="rounded-md bg-red-600 py-2 px-4 text-white text-sm hover:bg-red-700 focus:outline-none">
            Retour
        </a>
    </div>

    <form action="{{ route('equipes.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6 bg-white rounded-lg shadow-lg">
        @csrf
        @method('POST')

        <!-- Left Section (Placeholder Image) -->
        <div class="flex justify-center items-center border-2 border-blue-500 rounded-lg p-4">
            <!-- Placeholder Image -->
            <img src="https://via.placeholder.com/600x400" alt="Image de l'équipe" class="w-full h-full object-cover rounded-lg" />
        </div>

        <!-- Right Section (Form Inputs) -->
        <div>
            <div class="mb-4">
                <label for="nom" class="block text-gray-700 font-medium mb-2">Nom Equipe :</label>
                <input type="text" id="nom" name="nom" value="{{ old('nom') }}" placeholder="Nom de l'équipe" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('nom_equipe') border-red-500 @enderror">
                @error('nom')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="pays" class="block text-gray-700 font-medium mb-2">Pays Equipe :</label>
                <input type="text" id="pays" name="pays" value="{{ old('pays') }}" placeholder="Pays de l'équipe" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('pays_equipe') border-red-500 @enderror">
                @error('pays')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="fondation" class="block text-gray-700 font-medium mb-2">Fondation :</label>
                <input type="text" id="fondation" name="fondation" value="{{ old('fondation') }}" placeholder="Fondation de l'équipe" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('fondation') border-red-500 @enderror">
                @error('fondation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="titres" class="block text-gray-700 font-medium mb-2">Titres :</label>
                <input type="number" id="titres" name="titres" value="{{ old('titres') }}" placeholder="Nombre de titres" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('titres') border-red-500 @enderror">
                @error('titres')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="stade" class="block text-gray-700 font-medium mb-2">Stade :</label>
                <input type="text" id="stade" name="stade" value="{{ old('stade') }}" placeholder="Stade de l'équipe" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('stade') border-red-500 @enderror">
                @error('stade')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Ajouter
            </button>
        </div>
    </form>
</div>
@endsection
