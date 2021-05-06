<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prisons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('colline_id');
            $table->string('type_prison');
            $table->string('nbre_piece');
            $table->string('adresse_complete');
            $table->string ('fax');
            $table->integer ('code_prison');
            $table->timestamps();
            $table->foreign('colline_id')
                  ->references('id') 
                  ->on('collines')
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
        Schema::dropIfExists('prisons');
    }
}
