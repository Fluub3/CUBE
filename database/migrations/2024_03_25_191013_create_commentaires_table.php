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
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->text('Contenue');
            $table->unsignedBigInteger('id_ressource');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_User_Commenter');
            $table->unsignedBigInteger('ID_Ressource_Afficher');
            $table->timestamps();
            $table->unique(['id_ressource', 'id_user'], 'Commentaire_AK');
        });

        Schema::table('commentaires', function (Blueprint $table) {
            $table->foreign('id_User_Commenter')->references('id')->on('users');
            $table->foreign('ID_Ressource_Afficher')->references('id')->on('ressources');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commentaires');
    }
};
