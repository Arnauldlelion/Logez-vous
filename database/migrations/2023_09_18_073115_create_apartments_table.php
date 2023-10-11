<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();   
            $table->string('name');
            $table->string('floor');
            $table->enum('furnished', ['Meublé', 'Non meublé'])->default('Non meublé');
            $table->longText('description')->nullable();
            $table->string('monthly_price');
            $table->integer('number_of_pieces');
            $table->boolean('published')->default(false); 
            $table->integer('size');
            $table->unsignedBigInteger('property_id');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->unsignedBigInteger('apt_type_id');
            $table->foreign('apt_type_id')->references('id')->on('apartment_types')->onDelete('cascade');
            $table->bigInteger('cover_image_id')->nullable();
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
        Schema::dropIfExists('apartments');
    }
}
