<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJoueurRequest;
use App\Models\Equipe;
use App\Models\Joueur;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class JoueursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_players = Joueur::all();
        return view('joueurs.index')->with('all_players', $all_players);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all_teams = Equipe::all();
        return view('joueurs.create')->with('all_teams', $all_teams);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJoueurRequest $request)
    {
        $validatedRequest = $request->validated();

        $joueur = Joueur::create($validatedRequest);

        return redirect()->route('joueurs.index')->with('success', 'Joueur est ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $joueur = Joueur::with('equipe')->find($id);
        return view('joueurs.show')->with('player', $joueur);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $joueur = Joueur::with('equipe')->find($id);
        $all_teams = Equipe::all();

        return view('joueurs.edit')->with([
            'player' => $joueur,
            'all_teams' => $all_teams,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreJoueurRequest $request, int $id)
    {
        $validatedRequest = $request->validated();

        $joueur = Joueur::findOrFail($id);
        $joueur->update($validatedRequest);

        return redirect()
            ->route('joueurs.index')
            ->with('success', 'Le joueur a été modifié avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $joueur = Joueur::findOrFail($id);

        $joueur->delete();

        return redirect()->route('joueurs.index')->with('success', 'Un Equipe est supprimee avec succes');
    }

    public function getByEquipe($id)
    {
        $joueurs = Joueur::where('equipe_id', $id)->get();
        $equipes = Equipe::all(); // Rechargement des équipes pour réafficher le formulaire
        return view('home', compact('joueurs', 'equipes'));
    }

}
