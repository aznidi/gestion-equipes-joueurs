@extends('layouts.app')

@section('content')
    <div class="max-w-sm mx-auto bg-gray-50 rounded-lg shadow-md p-5 m-5">
        <p class="text-center font-semibold lowercase ">&copy; Aznidi Tous droits réservés.</p>
        <h2 class="text-2xl font-semibold text-center mb-6">Calcul de l’IMC</h2>

        <form action="{{ route('imc') }}" method="post">
            @csrf <!-- Pour la securite de la formulaire -->

            <div class="mb-4">
                <label for="nom" class="block text-gray-700 font-medium mb-2">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="Votre Nom ?" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
            </div>

            <div class="mb-4">
                <label for="prenom" class="block text-gray-700 font-medium mb-2">Prenom</label>
                <input type="text" id="prenom" name="prenom" placeholder="Votre Prenom ?" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
            </div>

            <div class="mb-6">
                <label for="sexe" class="block text-gray-700 font-medium mb-2">Sexe</label>
                <select id="sexe" name="sexe" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="poid" class="block text-gray-700 font-medium mb-2">Poid</label>
                <input type="number" id="poid" name="poid" placeholder="Votre Poid en kg?" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
            </div>

            <div class="mb-4">
                <label for="taille" class="block text-gray-700 font-medium mb-2">Taille</label>
                <input type="text" id="taille" name="taille" placeholder="Votre Taille en m ?" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Convertir</button>
        </form>
    </div>


    <!-- Affichage de message  -->


    @if (isset($phrase))
    <div class="max-w-sm mx-auto bg-green-400 rounded-lg shadow-md p-5 m-5 font-semibold uppercase ">
        {{ $phrase }}
    </div>
    @endif

@endsection
