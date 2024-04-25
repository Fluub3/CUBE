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
            $table->string('nom', 100);
            $table->string('prenom', 100);
            $table->string('password',250);
            $table->date('date_nais')->nullable();
            $table->string('rue', 100)->nullable();
            $table->string('cp', 5)->nullable();
            $table->string('ville', 200)->nullable();
            $table->string('mail', 200)->nullable();
            $table->date('date_inscription')->nullable();
            $table->string('Status', 200);
            $table->string('Permission', 200)->default(0);
            $table->boolean('is_admin')->default(false);
            $table->timestamps();
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
