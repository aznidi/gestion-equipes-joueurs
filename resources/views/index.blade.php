@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10 font-poppins">
    <!-- Formulaire de recherche centré -->
    <div class="text-center mb-8">
        <h2 class="text-2xl font-bold mb-4">Rechercher une Équipe</h2>
        <form action="{{ route('equipes.search') }}" method="GET" class="mx-auto w-full md:w-1/2">
            <input
                type="text"
                name="query"
                placeholder="Nom de l'équipe"
                class="w-full px-4 py-2 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300"
            />
            <button
                type="submit"
                class="mt-4 w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
                Rechercher
            </button>
        </form>
    </div>

    <!-- Résultats sous le formulaire, divisés en deux colonnes -->
    @if(isset($equipes) && $equipes->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Informations sur l'équipe (gauche) -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-blue-600 mb-4">{{ $equipes->first()->nom }}</h3>

                <!-- Informations de l'équipe, classées par ordre d'importance -->
                <div class="space-y-4">
                    <!-- Pays de l'équipe -->
                    <div class="flex items-center space-x-2">
                        <svg class="w-6 h-6 text-gray-600" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 4.6c-1.2 0-2.2.6-2.8 1.5-.8-1.1-2-1.5-3.2-.9-1.3.6-1.8 1.9-1.2 3.2 1.3 2.5 4.3 5.8 6.3 7.6 2-1.7 5-5 6.3-7.6.6-1.3.1-2.6-1.2-3.2-1.3-.6-2.4-.2-3.2.9-.6-.9-1.6-1.5-2.8-1.5zm0 4c-.5 0-.9.3-1.1.7-.3.5-.2 1.2.2 1.5 1 1.2 2.6 3.1 3.7 4.6 1.1-1.5 2.7-3.4 3.7-4.6.4-.3.5-.9.2-1.5-.3-.4-.7-.7-1.2-.7-1.4 0-2.8-.8-4.4-1.5-1.6.7-3.1 1.5-4.4 1.5-1.4 0-2.8-.8-4.4-1.5-.6.7-1.3 1.5-2.1 1.5zm4.8 5.6c.4 0 .8.3 1.1.7.3.4.3.9.2 1.3-.1.5-.5.8-.9.8-.5 0-.9-.3-1.1-.7-.3-.4-.3-.9-.2-1.3.1-.5.5-.8.9-.8zm-9.6 0c.4 0 .8.3 1.1.7.3.4.3.9.2 1.3-.1.5-.5.8-.9.8-.5 0-.9-.3-1.1-.7-.3-.4-.3-.9-.2-1.3.1-.5.5-.8.9-.8z"></path></svg>
                        <p class="text-lg">{{ $equipes->first()->pays }}</p>
                    </div>

                    <!-- Fondation de l'équipe -->
                    <div class="flex items-center space-x-2">
                        <svg class="w-6 h-6 text-gray-600" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M4 10h16v2h-16v-2zm0 4h16v2h-16v-2zm0 4h16v2h-16v-2zm0 4h16v2h-16v-2z"></path></svg>
                        <p class="text-lg">{{ $equipes->first()->fondation }}</p>
                    </div>

                    <!-- Stade de l'équipe -->
                    <div class="flex items-center space-x-2">
                        <svg class="w-6 h-6 text-gray-600" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21 4h-18c-1.1 0-1.99.9-1.99 2l-.01 12c0 1.1.89 2 1.99 2h18c1.1 0 2-.9 2-2v-12c0-1.1-.9-2-2-2zm0 14h-18v-10h18v10z"></path></svg>
                        <p class="text-lg">{{ $equipes->first()->stade }}</p>
                    </div>
                </div>
            </div>

            <!-- Tableau des joueurs (droite) -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-lg font-semibold mb-4">Joueurs de l'Équipe</h3>
                <table class="w-full text-left table-auto border-collapse">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b">Nom</th>
                            <th class="px-4 py-2 border-b">Date de contrat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($joueurs as $joueur)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $joueur->nom }}</td>
                                <td class="px-4 py-2">{{ $joueur->date_contrat }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @elseif(isset($equipes) && $equipes->isEmpty())
        <p class="text-center text-sm text-gray-300 mt-4">Aucune équipe trouvée pour cette recherche.</p>
    @endif
</div>
@endsection
