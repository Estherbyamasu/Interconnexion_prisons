<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('commune_id');
            $table->string('nom_colline');
            $table->string ('superficie');
            $table->integer ('etat');
            $table->timestamps();
            $table->foreign('commune_id')
                  ->references('id') 
                  ->on('communes')
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
        Schema::dropIfExists('collines');
    }
}
