<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContracts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
//            $table->string('Title');
            //$table->string('email')->unique();
            $table->string('bid_id');
            $table->string('contract_open_date');
            $table->string('contract_close_date');
            $table->longText('contract_note');
//            $table->string('proposed_date');
//            $table->string('classification');
//            $table->string('comments');
//            $table->string('state');
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
        Schema::table('contracts', function (Blueprint $table) {
            Schema::drop('contracts');
        });
    }
}
