<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJoueurRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'nom' => 'required|string|max:255',  // Le nom de l'équipe est requis, doit être une chaîne de caractères et avoir un maximum de 255 caractères
            'date_naissance' => 'required|date',  // Le pays est requis, doit être une chaîne de caractères
            'nationalite' => 'required|string|max:255',    // La date de fondation est requise, et doit être une chaîne de caractères
            'date_contrat' => 'required|date',        // Les titres sont optionnels, mais s'ils sont fournis, doivent être des entiers et >= 0
            'equipe_id' => 'required|exists:equipes,id',         // Le stade est optionnel, mais s'il est fourni, doit être une chaîne de caractères
        ];
    }

    /**
     * Obtenez les messages d'erreur personnalisés pour les règles de validation.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nom.required' => 'Le nom du joueur est obligatoire.',
            'nom.string' => 'Le nom du joueur doit être un string.',
            'date_naissance.required' => 'La date de naissance du joueur est obligatoire.',
            'nationalite.required' => 'La nationalité du joueur est obligatoire.',
            'nationalite.string' => 'La nationalité doit être un string.',
            'date_contrat.required' => 'La date de contrat du joueur est obligatoire.',
            'equipe_id.exists' => 'Veuillez choisir un équipe',
        ];
    }
}
