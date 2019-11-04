<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address');
            $table->string('phone_number', 15);
            $table->bigInteger('co_city')->unsigned();
            $table->integer('time_slot_per_client_in_min')->unsigned();
            $table->timestamps();
        });
        Schema::table('clinics', function (Blueprint $table) {
            $table->foreign('co_city')->references('co_city')->on('cities')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinics');
    }
}
