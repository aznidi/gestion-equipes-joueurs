<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EquipesController;
use App\Http\Controllers\JoueursController;
use Illuminate\Support\Facades\Route;

// Index
Route::get('/', [HomeController::class, 'index'])->name('home');

// CRUD for managing football teams
Route::resource('equipes', EquipesController::class);
// Route pour rechercher une équipe
Route::get('/recherche', [EquipesController::class, 'search'])->name('equipes.search');


// CRUD for managing football players
Route::resource('joueurs', JoueursController::class);
