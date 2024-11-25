@extends('layouts.app')

@section('content')
<div class="max-w-sm mx-auto bg-gray-50 rounded-lg shadow-md p-5 m-5">
    <p class="text-center font-semibold lowercase ">&copy; Aznidi Tous droits réservés.</p>
    <h2 class="text-2xl font-semibold text-center mb-6">Convertisseur de la monnaie nationale (DH)</h2>

    <!-- Formulaire de conversion -->
    <form action="{{ route('convertisseur') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nom" class="block text-gray-700 font-medium mb-2">Nom :</label>
            <input type="text" id="nom" name="nom" placeholder="Votre nom ?" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
        </div>

        <div class="mb-4">
            <label for="montant" class="block text-gray-700 font-medium mb-2">Montant :</label>
            <input type="number" id="montant" name="montant" placeholder="Montant ?" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
        </div>

        <div class="mb-6">
            <label for="devise" class="block text-gray-700 font-medium mb-2">Devise de conversion :</label>
            <select id="devise" name="devise" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="Dollar américain">Dollar américain</option>
                <option value="Dollar canadien">Dollar canadien</option>
                <option value="Euro">Euro</option>
                <option value="Livre sterling">Livre sterling</option>
            </select>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Convertir</button>
    </form>

    <!-- Affichage du message de conversion -->
    @if(isset($message))
        <div class="mt-4 p-4 bg-green-400 text-white font-semibold rounded-lg shadow-md">
            {{ $message }}
        </div>
    @endif
</div>
@endsection
