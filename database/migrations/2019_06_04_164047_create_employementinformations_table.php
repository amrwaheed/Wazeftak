<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployementinformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employementinformations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('expected_salary');
            $table->string('smoke');
            $table->string('license_drive');
            $table->text('youafterfive');

            $table->bigInteger('position_id')->unsigned();
            $table->bigInteger('scientific_id')->unsigned();
            $table->bigInteger('currancy_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('scientific_id')->references('id')->on('scientific_levels')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('currancy_id')->references('id')->on('currencies')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('employementinformations');
    }
}
