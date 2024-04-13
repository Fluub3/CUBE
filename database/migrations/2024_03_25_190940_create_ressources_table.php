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
            $table->integer('id_user')->nullable();
            $table->integer('id_commentaire')->nullable();
            $table->integer('id_permission_ressource')->nullable();
            $table->integer('id_Permission_Ressource_Permettre')->nullable();
            $table->integer('id_User_Creer')->nullable();
            $table->timestamps();
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
