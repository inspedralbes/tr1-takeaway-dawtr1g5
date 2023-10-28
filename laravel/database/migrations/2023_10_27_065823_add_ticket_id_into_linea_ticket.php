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
       Schema::table("linea_tickets", function (Blueprint $table){
           $table->bigInteger('ticket_id')->unsigned()->nullable();
           $table
            ->foreign('ticket_id')
            ->references('id')
            ->on('tickets')
            ->onUpdate('cascade')
            ->onDelete('cascade');
           
    });
    
}

/**
 * Reverse the migrations.
 */
public function down(): void
    {
        Schema::table('linea_tickets', function ($table){
            $table->dropForeign(['ticket_id']);
            $table->dropColumn(['ticket_id']);
        });

    }
};
