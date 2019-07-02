<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_informaions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('personal_name');
            $table->date('birthday');
            $table->string('address');
            $table->string('email')->unique();
            $table->mediumInteger('civil_id_number');
            $table->Integer('telephone');
            $table->string('mobile');
            $table->string('gender');
            $table->string('martial_status');
            $table->string('city_name');
            $table->string('image_name');


            $table->string('nationality_id')->references('id')->on('nationalities')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('country_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('religion_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();




            $table->foreign('religion_id')->references('id')->on('religions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('personal_informaions');
    }
}
