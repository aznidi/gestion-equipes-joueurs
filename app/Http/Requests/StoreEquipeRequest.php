<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipeRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à effectuer cette demande.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Permet à tous les utilisateurs d'accéder à cette requête
    }

    /**
     * Obtenez les règles de validation que la requête doit respecter.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom' => 'required|string|max:255',  // Le nom de l'équipe est requis, doit être une chaîne de caractères et avoir un maximum de 255 caractères
            'pays' => 'required|string|max:255',  // Le pays est requis, doit être une chaîne de caractères
            'fondation' => 'required|string|max:255',    // La date de fondation est requise, et doit être une chaîne de caractères
            'titres' => 'nullable|integer|min:0',        // Les titres sont optionnels, mais s'ils sont fournis, doivent être des entiers et >= 0
            'stade' => 'nullable|string|max:255',         // Le stade est optionnel, mais s'il est fourni, doit être une chaîne de caractères
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
            'nom.required' => 'Le nom de l\'équipe est obligatoire.',
            'pays.required' => 'Le pays de l\'équipe est obligatoire.',
            'fondation.required' => 'La date de fondation est obligatoire.',
            'titres.integer' => 'Le nombre de titres doit être un entier.',
            'titres.min' => 'Le nombre de titres ne peut pas être inférieur à zéro.',
            'stade.max' => 'Le nom du stade ne peut pas dépasser 255 caractères.',
        ];
    }
}
