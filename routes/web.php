<?php

use App\Http\Controllers\convertisseurController;
use App\Http\Controllers\EquipesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImcController;
use App\Http\Controllers\PretController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//index
Route::get('/', [HomeController::class, 'index']);


Route::get('/convertisseur', [convertisseurController::class, 'index']);
Route::post('/convertisseur', [convertisseurController::class, 'convertisseur'])->name('convertisseur');


// Les Routes de imc POST:pour passer les donnes de formulaire , GET : retourner des donnees en affichage
Route::get('/imc', [ImcController::class, 'index']);

Route::post('/imc', [ImcController::class, 'calculImc'])->name('imc');



// Les Routes de pret bancaire POST:pour passer les donnes de formulaire , GET : retourner des donnees en affichage
Route::get('/pret', [PretController::class, 'index']);

Route::post('/pret', [PretController::class, 'calculPret'])->name('pret');




// Les Routes de Reservation POST:pour passer les donnes de formulaire , GET : retourner des donnees en affichage
Route::get('/reservation', [ReservationController::class, 'index']);

Route::post('/reservation', [ReservationController::class, 'reservation'])->name('reservation');



// Crud Pour application, pour gerer les equipes de football


Route::get('/equipes', [EquipesController::class, 'index'])->name('equipes.index');
Route::get('/equipes/create', [EquipesController::class, 'create'])->name('equipes.create');
Route::post('/equipes', [EquipesController::class, 'store'])->name('equipes.store');
Route::get('/equipes/{id}', [EquipesController::class, 'show'])->name('equipes.show');
Route::get('/equipes/{id}/edit', [EquipesController::class, 'edit'])->name('equipes.edit');
Route::put('/equipes/{id}/edit', [EquipesController::class, 'update'])->name('equipes.update');
Route::delete('/equipes/{id}/', [EquipesController::class, 'destroy'])->name('equipes.destroy');


