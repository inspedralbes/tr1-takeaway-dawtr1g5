<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->decimal('final_price', 10, 2);
            $table->enum('estat', ['Pendent de preparar', 'En preparació', 'Preparat per recollir', 'Recollit'])->default('Pendent de preparar');
            $table->string('user_name');
            $table->string('user_email');
            $table->binary('qr')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};