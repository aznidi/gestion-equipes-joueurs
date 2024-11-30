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
        Schema::table('equipes', function (Blueprint $table) {
            $table->dropColumn('logo');  // Supprimer la colonne 'logo'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipes', function (Blueprint $table) {
            $table->string('logo');  // Recréer la colonne 'logo' si on annule la migration
        });
    }
};
