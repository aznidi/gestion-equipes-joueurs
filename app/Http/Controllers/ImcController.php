<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImcController extends Controller
{
    public function index ()
    {
        return view('imc');
    }

    public function calculImc(Request $request)
{
    $nom = $request->nom;
    $prenom = $request->prenom;
    $sexe = $request->sexe;
    $poids = floatval($request->get('poid'));
    $taille = floatval($request->get('taille'));

    $imc = $poids / pow($taille, 2);

    $response = [];
    $response['imc'] = $imc;


    $response['sexe'] = ($sexe == 'Homme') ? 'Mr' : 'Mme';


    if ($imc < 18.5) {
        $response['interpretation'] = 'maigre';
    } elseif ($imc >= 18.5 && $imc <= 25) {
        $response['interpretation'] = 'poids idéal';
    } elseif ($imc > 25 && $imc <= 30) {
        $response['interpretation'] = 'surpoids';
    } else {
        $response['interpretation'] = 'obésité';
    }


    $phrase = "Bonjour " . $response['sexe'] . " " . $nom . " " . $prenom . ", votre IMC est " . round($response['imc'], 2) . ". L'interprétation de votre poids est " . $response['interpretation'] . ".";


    return view('imc')->with('phrase', $phrase);
}
}
