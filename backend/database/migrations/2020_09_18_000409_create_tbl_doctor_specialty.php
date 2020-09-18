<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDoctorSpecialty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_specialty', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('doctor_id')->unsigned()->index();
            $table->integer('specialty_id')->unsigned()->index();
            $table->timestamps();

            $table->unique(['doctor_id','specialty_id']);

            $table->foreign('doctor_id')->references('id')->on('doctor');            
            $table->foreign('specialty_id')->references('id')->on('specialty');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_specialty');
    }
}