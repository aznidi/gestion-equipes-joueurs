<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipesController extends Controller
{
    public function __construct()
    {
        // Initialiser les équipes dans la session si elles n'existent pas déjà
        if (!session()->has('equipes')) {
            session()->put('equipes', [
                [
                    "id" => 1,
                    "nom" => "FCB",
                    "pays" => "Espagne",
                    "fondation" => 1899,
                    "titres" => 26,
                    "stade" => "Camp Nou",
                    "logo_url" => "https://logos-world.net/wp-content/uploads/2020/04/Barcelona-Logo.png"
                ],
                [
                    "id" => 2,
                    "nom" => "PSG",
                    "pays" => "France",
                    "fondation" => 1970,
                    "titres" => 9,
                    "stade" => "Parc des Princes",
                    "logo_url" => "https://logos-marques.com/wp-content/uploads/2020/10/PSG-Logo-1.png"
                ],
                [
                    "id" => 3,
                    "nom" => "Manchester",
                    "pays" => "Angleterre",
                    "fondation" => 1878,
                    "titres" => 20,
                    "stade" => "Old Trafford",
                    "logo_url" => "https://download.logo.wine/logo/Manchester_United_F.C./Manchester_United_F.C.-Logo.wine.png"
                ],
                [
                    "id" => 4,
                    "nom" => "Real Madrid",
                    "pays" => "Espagne",
                    "fondation" => 1902,
                    "titres" => 34,
                    "stade" => "Santiago Bernabéu",
                    "logo_url" => "https://logo-marque.com/wp-content/uploads/2020/11/Real-Madrid-Logo.png"
                ],
                [
                    "id" => 5,
                    "nom" => "Juventus",
                    "pays" => "Italie",
                    "fondation" => 1897,
                    "titres" => 36,
                    "stade" => "Allianz Stadium",
                    "logo_url" => "https://logo-marque.com/wp-content/uploads/2020/11/Juventus-FC-Logo.png"
                ]
            ]);
        }
    }

    public function index()
    {
        $equipes = session('equipes');
        return view('equipes.index')->with('all_teams', $equipes);
    }

    public function create()
    {
        return view('equipes.create');
    }

    public function store(Request $request)
    {
        $equipes = session('equipes');

        // Déterminer le dernier ID
        $lastElement = end($equipes);
        $lastId = $lastElement['id'];

        // Ajouter la nouvelle équipe avec un ID incrémenté
        $newEquipe = [
            'id' => $lastId + 1,
            'nom' => $request->nom_equipe,
            'pays' => $request->pays_equipe,
            'fondation' => $request->fondation,
            'titres' => $request->titres,
            'stade' => $request->stade,
            'logo_url' => 'https://placehold.co/600x400/png'
        ];

        $equipes[] = $newEquipe;

        session()->put('equipes', $equipes);

        return redirect()->route('equipes.index')->with('success', 'Nouvelle équipe ajoutée avec succès.');
    }

    public function show($id)
    {
        $equipes = session('equipes');

        // Rechercher l'équipe par ID
        $team = collect($equipes)->firstWhere('id', $id);

        if (!$team) {
            abort(404, 'Équipe non trouvée.');
        }

        return view('equipes.show')->with('team', $team);
    }

    public function edit($id)
    {
        $equipes = session('equipes');

        // Rechercher l'équipe par ID
        $team = collect($equipes)->firstWhere('id', $id);

        if (!$team) {
            abort(404, 'Équipe non trouvée.');
        }

        return view('equipes.edit')->with('team', $team);
    }

    public function update(Request $request, $id)
    {
        $equipes = session('equipes');

        // Mettre à jour les informations de l'équipe
        foreach ($equipes as &$equipe) {
            if ($equipe['id'] == $id) {
                $equipe['nom'] = $request->nom_equipe;
                $equipe['pays'] = $request->pays_equipe;
                $equipe['fondation'] = $request->fondation;
                $equipe['titres'] = $request->titres;
                $equipe['stade'] = $request->stade;
                break;
            }
        }

        session()->put('equipes', $equipes);

        return redirect()->route('equipes.index')->with('success', 'Équipe mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $equipes = session('equipes');

        // Supprimer l'équipe par ID
        $equipes = array_filter($equipes, function ($equipe) use ($id) {
            return $equipe['id'] != $id;
        });

        session()->put('equipes', array_values($equipes));

        return redirect()->route('equipes.index')->with('success', 'Équipe supprimée avec succès.');
    }
}
