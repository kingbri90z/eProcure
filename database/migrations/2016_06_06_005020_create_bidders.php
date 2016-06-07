<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('trn');
            $table->string('telephone');
            $table->string('mobile');
            $table->string('fax');
            $table->string('password');
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
        Schema::table('bidders', function (Blueprint $table) {
            Schema::drop('bidders');
        });
    }
}
