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
        Schema::create('_reserverings', function (Blueprint $table) {
            
            $table->id('Reserveringsnummer');
            $table->unsignedBigInteger('PersoonId');
            $table->unsignedBigInteger('OpeningstijdId');
            $table->unsignedBigInteger('TariefId');
            $table->unsignedBigInteger('BaanId');
            $table->unsignedBigInteger('PakketOptieId')->nullable();
            $table->unsignedBigInteger('ReserveringStatusID');
            $table->date('datum');
            $table->integer('AantalUren');
            $table->time('BeginTijd');
            $table->time('EindTijd');
            $table->integer('AantalVolwassen');
            $table->integer('AantalKinderen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_reserverings');
    }
};
