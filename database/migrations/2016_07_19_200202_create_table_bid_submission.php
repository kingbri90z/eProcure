<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBidSubmission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidsubmissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bid_id')->unique();
            $table->string('title');
            $table->string('bidder_id');
            $table->string('tender_id');
            $table->string('category');
            $table->string('company');
            $table->string('estimated_value');
            $table->longtext('bid_details');
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

        Schema::table('bidsubmissions', function (Blueprint $table) {
            Schema::drop('bidsubmissions');
        });
    }
}
