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
        Schema::create('ressources', function (Blueprint $table) {
            $table->id();
            $table->string('Titre_ressource', 250);
            $table->text('Contenue');
            $table->integer('Nb_vue');
            $table->date('Date');
            $table->string('Status', 250);
            $table->integer('id_user');
            $table->integer('id_commentaire');
            $table->integer('id_permission_ressource');
            $table->integer('id_Permission_Ressource_Permettre');
            $table->integer('id_User_Creer');
            $table->timestamps();
            $table->unique(['id_user', 'id_commentaire', 'id_permission_ressource'], 'Ressource_AK');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ressources');
    }
};
