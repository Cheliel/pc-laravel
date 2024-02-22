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
        Schema::create('Pokemons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // uuid()ob
            $table->string('breed', 150);
            $table->tinyInteger('age');
            $table->string('element',50);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
};
