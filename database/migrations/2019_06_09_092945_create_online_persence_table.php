<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnlinePersenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_presences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('linkedin')->nullable();
            $table->text('facebook')->nullable();
            $table->text('behance')->nullable();
            $table->text('instgram')->nullable();
            $table->text('github')->nullable();
            $table->text('stack_overview')->nullable();
            $table->text('youtube')->nullable();
            $table->text('blog')->nullable();
            $table->text('website')->nullable();
            $table->text('others')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
            //relation
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('online_presences');
    }
}
