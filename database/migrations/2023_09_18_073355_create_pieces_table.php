<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pieces', function (Blueprint $table) {
            $table->id();
            $table->integer('nombre_of_pieces');
            $table->string('size');
            // $table->string('piece_images');
            $table->unsignedBigInteger('apartment_id');
            $table->unsignedBigInteger('piece_types_id');
            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('cascade');
            $table->foreign('piece_types_id')->references('id')->on('piece_types')->onDelete('cascade');
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
        Schema::dropIfExists('pieces');
    }
}
