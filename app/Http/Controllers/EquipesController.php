<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Joueur;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEquipeRequest;

class EquipesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_teams = Equipe::all();
        return view('equipes.index')->with('all_teams', $all_teams);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquipeRequest $request)
    {
        $validatedRequest = $request->validated();
        $equipe = Equipe::create($validatedRequest);

        return redirect()->route('equipes.index')->with('success', 'L\'équipe a été ajoutée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $equipe = Equipe::where('id', $id)->first();
        $joueurs = $equipe->joueurs;
        return view('equipes.show')->with([
            'team' => $equipe,
            'players' => $joueurs,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $equipe = Equipe::where('id', $id)->first();
        return view('equipes.edit')->with('team', $equipe);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEquipeRequest $request, int $id)
    {
        $validatedRequest = $request->validated();

        $equipe = Equipe::findOrFail($id);

        $equipe->update($validatedRequest);

        return redirect()->route('equipes.index')->with('success', 'Equipe est Mis a jout avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $equipe = Equipe::findOrFail($id);

        $equipe->delete();

        return redirect()->route('equipes.index')->with('success', 'Un Equipe est supprimee avec succes');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Recherche des équipes dont le nom contient la chaîne de recherche
        $equipes = Equipe::where('nom', 'LIKE', "%{$query}%")->get();

        // Si une équipe est trouvée, on récupère ses joueurs
        $joueurs = [];
        if ($equipes->isNotEmpty()) {
            $joueurs = Joueur::where('equipe_id', $equipes->first()->id)->get();
        }

        // Renvoie la vue avec les résultats
        return view('index', compact('equipes', 'joueurs'));
    }


}
