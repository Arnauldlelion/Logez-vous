<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('slug');
            $table->enum('accomodation', [
                'single',
                'many'
            ])->default('single');
            $table->string('type');
            $table->longText('description')->nullable();
            $table->string('location');
            $table->string('number_of_rooms');
            $table->enum('need_tenant', ['yes', 'no'])->default(('no'));
            $table->string('monthly_rent_price');
            $table->string('approx_surface_area')->nullable();
            $table->enum('furnished', ['yes', 'no'])->default('no');
            $table->dateTime('availability_date');
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
        Schema::dropIfExists('properties');
    }
}