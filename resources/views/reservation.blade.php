@extends('layouts.app')

@section('content')
<div class="max-w-sm mx-auto bg-gray-50 rounded-lg shadow-md p-5 m-5">
    <p class="text-center font-semibold lowercase ">&copy; Aznidi Tous droits réservés.</p>
    <h2 class="text-2xl font-semibold text-center mb-6">Réservation d’un billet TNR</h2>

    @if(isset($coutTotal))
        <!-- Affichage du message de coût total -->
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
            <p class="text-center">Le coût total de votre billet est de <span class="font-bold">{{ $coutTotal }} DH</span>.</p>
        </div>
    @endif

    <form action="{{ route('reservation') }}" method="post">
        @csrf <!-- Pour la sécurité de la formulaire -->

        <!-- Formulaire de réservation (champs identiques à ceux déjà fournis) -->
        <div class="mb-4">
            <label for="nom" class="block text-gray-700 font-medium mb-2">Nom</label>
            <input type="text" id="nom" required name="nom" placeholder="Votre Nom ?" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"  />
        </div>

        <div class="mb-4">
            <label for="prenom" class="block text-gray-700 font-medium mb-2">Prenom</label>
            <input type="text" id="prenom" required name="prenom" placeholder="Votre Prenom ?" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"  />
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" id="email" required name="email" placeholder="Votre Email ?" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"  />
        </div>

        <div class="mb-4">
            <label for="depart" class="block text-gray-700 font-medium mb-2">Ville de départ</label>
            <select id="depart" name="depart" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="Casa">Casa</option>
                <option value="Rabat">Rabat</option>
                <option value="Kenitra">Kenitra</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="arrivee" class="block text-gray-700 font-medium mb-2">Ville d'arrivée</label>
            <select id="arrivee" name="arrivee" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="Casa">Casa</option>
                <option value="Rabat">Rabat</option>
                <option value="Kenitra">Kenitra</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="classe" class="block text-gray-700 font-medium mb-2">Classe</label>
            <select name="classe" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="premiere">Première Classe</option>
                <option value="deuxieme">Deuxième Classe</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Services supplémentaires</label>
            <div class="flex items-center">
                <input type="checkbox" name="services[]" value="dejeuner" id="dejeuner" class="mr-2">
                <label for="dejeuner" class="text-gray-700">Déjeuner (60 DH)</label>
            </div>
            <div class="flex items-center">
                <input type="checkbox" name="services[]" value="journaux" id="journaux" class="mr-2">
                <label for="journaux" class="text-gray-700">Journaux (12 DH)</label>
            </div>
            <div class="flex items-center">
                <input type="checkbox" name="services[]" value="wifi" id="wifi" class="mr-2">
                <label for="wifi" class="text-gray-700">Accès Wifi (10 DH)</label>
            </div>
        </div>

        <div class="mb-4">
            <label for="type" class="block text-gray-700 font-medium mb-2">Type de billet</label>
            <select name="type" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="simple">Aller Simple</option>
                <option value="aller_retour">Aller/Retour</option>
            </select>
        </div>

        <!-- Boutons de soumission et de réinitialisation -->
        <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Calculer</button>
        <button type="reset" class="mt-2 w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Réinitialiser</button>
    </form>
</div>
@endsection
