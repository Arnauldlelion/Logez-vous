<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppartmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appartments', function (Blueprint $table) {
            $table->id();
            $table->string('floor');
            $table->enum('furnished', ['Meublé', 'Non meublé'])->default('Non meublé');
            $table->longText('description')->nullable();
            $table->string('monthly_price');
            $table->integer('number_of_pieces');
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('apt_type_id');
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
        Schema::dropIfExists('appartments');
    }
}
