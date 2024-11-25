<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PretController extends Controller
{
    public function index()
    {
        return view('pret');
    }

    public function calculPret (Request $request)
    {
        $montant = $request->montant;
        $duree = $request->duree;
        $taux = $request->taux;

        $mensualite = ($montant * ($taux / 120)) / (1- pow( 1 + ($taux / 120) , -24)  );

        $response =  [];

        $response['mensualite'] = $mensualite;

        if ($mensualite <= 1000) {
            $response['color'] = 'green';
        } elseif ($mensualite > 1000 && $mensualite <= 2000) {
            $response['color'] = 'orange';

        } else {
            $response['color'] = 'red';
        }

        return view('pret')->with('response', $response);
    }


}
