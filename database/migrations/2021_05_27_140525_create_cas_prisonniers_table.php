<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasPrisonniersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cas_prisonniers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('prisonnier_prison_id');
            $table->unsignedBigInteger('occupation_id');
            $table->string('lieu_passation');
            $table->string('date_cas');
            $table->string('heure_cas');
            $table->string('raison_cas');
            $table->string('nbr_temoins');
            $table->timestamps();
            $table->foreign('category_id')
                  ->references('id') 
                  ->on('categories')
                  ->onDelete('cascade');
            $table->foreign('prisonnier_prison_id')
                  ->references('id') 
                  ->on('prisonnier_prisons')
                  ->onDelete('cascade');
             $table->foreign('occupation_id')
                  ->references('id') 
                  ->on('occupations')
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
        Schema::dropIfExists('cas_prisonniers');
    }
}
