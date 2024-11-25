@extends('layouts.app')


@section('content')


<div class="mx-auto rounded-lg p-5 m-5">
    <div class="flex items-center justify-between ">
        <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight
        text-gray-900 md:text-3xl lg:text-4xl dark:text-dark">
            Ajouter Un
                <mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">
                    Equipe</mark>

        </h1>
        <a href="{{route('equipes.index')}}" class="rounded-md bg-red-600 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-red-700 focus:shadow-none active:bg-red-700 hover:bg-red-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2">
            Retour
        </a>
    </div>

    <form action="{{route('equipes.store')}}" method="POST" class="mt-5 border rounded-md p-3 m-3 border-blue-300 shadow-md">
        @method('POST')
        @csrf
        <div class="mb-4">
            <label for="nom_equipe" class="block text-gray-700 font-medium mb-2">Nom Equipe :</label>
            <input type="text" id="nom_equipe" name="nom_equipe" placeholder="Nom Equipe ?" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
        </div>

        <div class="mb-4">
            <label for="pays_equipe" class="block text-gray-700 font-medium mb-2">Pays Equipe :</label>
            <input type="text" id="pays_equipe" name="pays_equipe" placeholder="Pays Equipe ?" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
        </div>


        <div class="mb-4">
            <label for="fondation" class="block text-gray-700 font-medium mb-2">Fondation :</label>
            <input type="text" id="fondation" name="fondation" placeholder="Fondation ?" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />

        <div class="mb-4">
            <label for="titres" class="block text-gray-700 font-medium mb-2">Titres :</label>
            <input type="number" id="titres" name="titres" placeholder="Nb Titres ?" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
        </div>

        <div class="mb-4">
            <label for="stade" class="block text-gray-700 font-medium mb-2">Stade :</label>
            <input type="text" id="stade" name="stade" placeholder="Stade ?" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
        </div>


        <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Ajouter
        </button>
    </form>



</div>

@endsection
