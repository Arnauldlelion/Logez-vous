<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appartments', function (Blueprint $table) {
            $table->id();
            $table->string('floor');
            $table->enum('furnished', ['yes', 'no'])->default('no');
            $table->longText('description')->nullable();
            $table->string('monthly_price');
            $table->integer('number_of_appartments');
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('apt_type_id');
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
