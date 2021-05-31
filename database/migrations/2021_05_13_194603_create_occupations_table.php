<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOccupationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occupations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prison_id');
            $table->unsignedBigInteger('personnel_id');
            $table->unsignedBigInteger('fonction_id');
           $table->integer ('etat');
            $table->string ('code_occupationcode_occupation');
            $table->timestamps();
            $table->foreign('prison_id')
                  ->references('id') 
                  ->on('prisons')
                  ->onDelete('cascade');
            $table->foreign('personnel_id')
                  ->references('id') 
                  ->on('personnels')
                  ->onDelete('cascade');
             $table->foreign('fonction_id')
                  ->references('id') 
                  ->on('fonctions')
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
        Schema::dropIfExists('occupations');
    }
}
