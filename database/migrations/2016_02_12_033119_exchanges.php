<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Exchanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('exchanges')) {
            Schema::create('exchanges', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('abbreviation');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('exchanges')) {
            Schema::drop('exchanges');
        }
    }
}
