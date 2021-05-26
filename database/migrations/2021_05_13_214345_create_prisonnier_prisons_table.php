<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrisonnierPrisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prisonnier_prisons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prison_id');
            $table->unsignedBigInteger('prisonnier_id');
            $table->integer ('etat');
            $table->timestamps();
            $table->foreign('prison_id')
                  ->references('id') 
                  ->on('prisons')
                  ->onDelete('cascade');
            $table->foreign('prisonnier_id')
                  ->references('id') 
                  ->on('prisonniers')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prisonnier_prisons');
    }
}
