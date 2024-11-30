<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'pays', 'fondation', 'titres', 'stade', 'logo'];

    // Relation avec les joueurs
    public function joueurs()
    {
        return $this->hasMany(Joueur::class);
    }
}
