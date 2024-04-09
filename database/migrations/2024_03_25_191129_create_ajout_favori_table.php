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
        Schema::create('ajout_favori', function (Blueprint $table) {
            $table->id(); // Utilisation de la méthode id() pour créer une clé primaire auto-incrémentée
            $table->bigInteger('id_User')->unsigned();
            $table->bigInteger('id_Ressource')->unsigned();
            $table->foreign('id_Ressource')->references('id')->on('ressources');
            $table->foreign('id_User')->references('id')->on('users');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ajout_favori');
    }
};
