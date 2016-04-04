<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBlockTrail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_trail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->references('id')->on('users');
            $table->string('log_activity');
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
        Schema::drop('block_trail');
    }
}
