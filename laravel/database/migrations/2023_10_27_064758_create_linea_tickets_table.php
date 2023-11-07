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
        Schema::create('linea_tickets', function (Blueprint $table) {
            $table->id('id_linea');
            $table->string('product_name');
            $table->string('product_artist')->nullable();
            $table->string('product_year_release')->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('quantity');
            $table->string('product_genre')->nullable();
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('linea_tickets');
    }
};
