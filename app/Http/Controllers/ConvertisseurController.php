<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class convertisseurController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('convertisseur');
    }

    public function convertisseur(Request $request)
    {

        // Les donnees depuis le formulaire
        $nom = $request->nom;
        $montant = $request->montant;
        $devise = $request->devise;


        // Array de taux de conversation
        $tauxConversion = [
            'Dollar américain' => 10.3,
            'Dollar canadien' => 7.6,
            'Euro' => 10.9,
            'Livre sterling' => 12.5
        ];

        //Calcul Logique
        $montantConverti = $montant * $tauxConversion[$devise];

        // Message
        $message = "{$nom}, le montant de {$montant} {$devise} vaut {$montantConverti} DH";

        //Retourner le vue avec un variable message
        return view('convertisseur')->with('message', $message);
    }


}
