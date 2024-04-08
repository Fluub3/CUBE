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
        Schema::create('reponse_commentaires', function (Blueprint $table) {
            $table->id();
            $table->text('Contenue');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_commentaire');
            $table->unsignedBigInteger('Id_Commentaire_Afficher');
            $table->unsignedBigInteger('id_User_Appartenir');
            $table->timestamps();
            $table->unique(['id_user', 'id_commentaire'], 'Reponse_commentaire_AK');
        });

        Schema::table('reponse_commentaires', function (Blueprint $table) {
            $table->foreign('Id_Commentaire_Afficher')->references('id')->on('commentaires');
            $table->foreign('id_User_Appartenir')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reponse_commentaires');
    }
};
