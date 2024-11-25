<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view('reservation');
    }

    public function reservation(Request $request)
    {
        // Récupérer les données du formulaire
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $email = $request->input('email');
        $depart = $request->input('depart');
        $arrivee = $request->input('arrivee');
        $classe = $request->input('classe');
        $services = $request->input('services', []); // Liste des services sélectionnés
        $type = $request->input('type'); // Type de billet (aller simple ou aller/retour)

        // Définir les tarifs de base en fonction de la ville de départ et d'arrivée
        $tarifs = [
            'Casa-Rabat' => ['aller_simple' => 48, 'aller_retour' => 90],
            'Rabat-Kenitra' => ['aller_simple' => 32, 'aller_retour' => 96],
            'Casa-Kenitra' => ['aller_simple' => 75, 'aller_retour' => 140],
        ];

        // Déterminer la clé du trajet en fonction des villes de départ et d'arrivée
        $trajet = "{$depart}-{$arrivee}";
        $tarifBase = $tarifs[$trajet][$type == 'aller_retour' ? 'aller_retour' : 'aller_simple'] ?? 0;

        // Ajouter le supplément pour la première classe
        if ($classe == 'premiere') {
            $tarifBase += 50;
        }

        // Calculer le coût des services sélectionnés
        $coutServices = 0;
        if (in_array('dejeuner', $services)) {
            $coutServices += 60;
        }
        if (in_array('journaux', $services)) {
            $coutServices += 12;
        }
        if (in_array('wifi', $services)) {
            $coutServices += 10;
        }

        // Calculer le coût total
        $coutTotal = $tarifBase + $coutServices;

        // Retourner à la vue avec le coût total
        return view('reservation')->with('coutTotal', $coutTotal);
    }


}
