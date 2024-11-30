<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('joueurs', function (Blueprint $table) {
            $table->id(); // Clé primaire de la table joueurs
            $table->string('nom'); // Nom du joueur
            $table->date('date_naissance'); // Date de naissance
            $table->string('nationalite'); // Nationalité
            $table->date('date_contrat'); // Date de contrat
            $table->unsignedBigInteger('equipe_id'); // Clé étrangère vers la table "equipes"
            $table->foreign('equipe_id') // Définit la clé étrangère
                ->references('id') // Fait référence au champ "id" de la table "equipes"
                ->on('equipes') // Table de référence
                ->onDelete('cascade'); // Suppression en cascade
            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('joueurs');
    }
};
