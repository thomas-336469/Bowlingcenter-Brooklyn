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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->constrained();
            $table->foreignId('alley_id')->constrained();
            //$table->foreignId('option_id')->constrained(); Not needed
            //$table->foreignId('opening_id')->constrained(); Not needed
            //$table->foreignId('rate_id')->constrained(); Not needed
            //$table->foreignId('status_id')->constrained(); Not needed
            $table->string('reservation_number');
            $table->date('reservation_date');
            $table->decimal('reservation_duration', 8, 2);
            $table->time('reservation_start_time');
            $table->time('reservation_end_time');
            $table->integer('number_of_adults');
            $table->integer('number_of_children')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
