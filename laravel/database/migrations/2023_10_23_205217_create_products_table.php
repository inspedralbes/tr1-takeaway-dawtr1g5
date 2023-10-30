<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('artist');
            $table->string('year')->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('count')->default(1);
            $table->binary('image')->nullable();
            $table->text('compositores')->nullable();
            $table->text('productora')->nullable();
            $table->decimal('reproducciones', 8, 2)->nullable();
            $table->integer('duracion')->nullable();
            $table->text('tracklist')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};