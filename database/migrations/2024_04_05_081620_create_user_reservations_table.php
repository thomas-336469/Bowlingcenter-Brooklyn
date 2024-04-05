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
        Schema::create('user_reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('rate_id')->constrained();
            $table->foreignId('alley_id')->constrained();
            $table->foreignId('option_id')->nullable()->constrained();
            $table->dateTime('date');
            $table->integer('duration');
            $table->decimal('total_cost', 5, 2);
            $table->integer('amount_of_people');
            $table->integer('amount_of_children');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_reservations');
    }
};