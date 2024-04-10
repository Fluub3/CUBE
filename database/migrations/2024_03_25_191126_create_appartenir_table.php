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
        Schema::create('appartenir', function (Blueprint $table) {
            $table->unsignedBigInteger('Id');
            $table->unsignedBigInteger('ID_Ressource');
            $table->primary(['Id', 'ID_Ressource']);
            $table->foreign('Id')->references('Id')->on('categories')->onDelete('cascade');
            $table->foreign('ID_Ressource')->references('ID')->on('ressources')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appartenir');
    }
};
