<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'date_naissance',
        'nationalite',
        'date_contrat',
        'equipe_id',
    ];

    // Relation avec le modèle Equipe
    public function equipe()
    {
        return $this->belongsTo(Equipe::class, 'equipe_id');
    }
}
