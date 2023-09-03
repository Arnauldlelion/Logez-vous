<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportDeGestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapport_de_gestions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('annee_construction');
            $table->integer('nombreDeLocataire');
            $table->string('dureeDuLocataire');
            $table->unsignedBigInteger('appartment_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rapport_de_gestions');
    }
}
