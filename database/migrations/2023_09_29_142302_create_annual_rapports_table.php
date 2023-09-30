<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnualRapportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annual_rapports', function (Blueprint $table) {
            $table->id();
            $table->string('rapport');
            $table->string('path');
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('apartment_id');
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
        Schema::dropIfExists('annual_rapports');
    }
}
