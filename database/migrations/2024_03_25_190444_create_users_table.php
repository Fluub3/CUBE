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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->text('password');
            $table->string('nom', 100);
            $table->string('prenom', 100);
            $table->date('date_nais')->nullable();
            $table->string('rue', 100);
            $table->string('cp', 5);
            $table->string('ville', 200)->nullable();
            $table->string('mail', 200)->nullable();
            $table->date('date_inscription')->nullable();
            $table->date('date');
            $table->string('Status', 200)->nullable();
            $table->integer('Favoris')->nullable();
            $table->string('Id_Groupe', 200)->nullable();
            $table->integer('Id_Ressource')->nullable();
            $table->string('Id_commentaire', 200)->nullable();
            $table->string('Id_Reponse_Com', 200)->nullable();
            $table->timestamps();
            $table->unique(['Favoris', 'Id_Groupe', 'Id_Ressource', 'Id_commentaire', 'Id_Reponse_Com'], 'User_AK');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
