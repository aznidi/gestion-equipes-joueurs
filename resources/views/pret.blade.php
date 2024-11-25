@extends('layouts.app')


@section('content')
    <div class="max-w-sm mx-auto bg-gray-50 rounded-lg shadow-md p-5 m-5">
        <p class="text-center font-semibold lowercase ">&copy; Aznidi Tous droits réservés.</p>
        <h2 class="text-2xl font-semibold text-center mb-6">Calcul d’un prêt bancaire</h2>

        <form action="{{ route('pret') }}" method="post">
            @csrf <!-- Pour la securite de la formulaire -->

            <div class="mb-4">
                <label for="montant" class="block text-gray-700 font-medium mb-2">Montant</label>
                <input type="number" id="montant" name="montant" placeholder="Votre montant ?" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="{{old('montant')}}" />
            </div>

            <div class="mb-4">
                <label for="duree" class="block text-gray-700 font-medium mb-2">Duree</label>
                <input type="number" id="duree" name="duree" placeholder="Votre duree en mois ?" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="{{old('duree')}}"/>
            </div>

            <div class="mb-4">
                <label for="taux" class="block text-gray-700 font-medium mb-2">Taux</label>
                <input type="text" id="taux" name="taux" placeholder="Votre taux Interet Annuel" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="{{old('taux')}}"/>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Calculer</button>
        </form>
    </div>


    <!-- Affichage de message  -->


    @if (isset($response))
    <div class="max-w-sm mx-auto bg-white border border-blue-600 rounded-lg shadow-md p-5 m-5 font-semibold uppercase ">
        <p class="text text-bold " style="color: {{$response['color']}}">
            La mensualité est {{round($response['mensualite'])}} DH
        </p>
    </div>
    @endif

@endsection

