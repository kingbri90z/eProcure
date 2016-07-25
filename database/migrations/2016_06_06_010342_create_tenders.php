<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Title');
            //$table->string('email')->unique();
//            $table->string('bidder');
            $table->string('open_date');
            $table->string('close_date');
            $table->string('budgetallocation');
//            $table->string('proposed_date');
            $table->string('classification');
            $table->string('description');
            $table->string('comments');
            $table->string('procurement_method');
//            $table->rememberToken();
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
        Schema::table('tenders', function (Blueprint $table) {
            //
        });
    }
}
