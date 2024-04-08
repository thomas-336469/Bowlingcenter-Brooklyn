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
        Schema::create('_persoons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('TypePersoonId')->constrained('_type_persoons')->onDelete('cascade');
            $table->string('Voornaam');
            $table->string('Tussenvoegsel')->nullable();
            $table->string('Achternaam');
            $table->string('Roepnaam');
            $table->boolean('IsVolwassen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_persoons');
    }
};
