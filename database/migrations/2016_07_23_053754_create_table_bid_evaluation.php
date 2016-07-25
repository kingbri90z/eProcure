<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBidEvaluation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidevaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bid_id')->unique();
            $table->string('bidder_id');
            $table->string('decision');
            $table->longText('comment');
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

        Schema::table('bidevaluations', function (Blueprint $table) {
            Schema::drop('bidevaluations');
        });
    }
}
