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
        Schema::create('permission_ressources', function (Blueprint $table) {
            $table->id();
            $table->integer('Permission');
            $table->bigInteger('id_ressource')->unsigned();

            $table->timestamps();
        });

        Schema::table('permission_ressources', function (Blueprint $table) {
            $table->foreign('id_ressource')->references('id')->on('ressources')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission_ressources');
    }
};
