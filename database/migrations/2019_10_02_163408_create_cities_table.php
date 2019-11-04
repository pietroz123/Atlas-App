<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigInteger('co_city')->unsigned();
            $table->string('city_name');
            $table->bigInteger('co_state')->unsigned();
            $table->primary('co_city');
        });
        Schema::table('cities', function (Blueprint $table) {
            $table->foreign('co_state')->references('co_state')->on('states')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
