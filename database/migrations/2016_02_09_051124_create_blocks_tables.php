<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlocksTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return vpopmail_del_domain(domain)
     */
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('symbol');
            $table->integer('exchange_id')->unsigned();
            //$table->foreign('exchange_id')->references('id')->on('exchanges')->onDelete('no action');
            $table->string('discount');
            $table->string('number_shares');
            // $table->string('discount_achieved');
            // $table->string('discount_commission');
            $table->integer('need_id')->unsigned();
           // $table->foreign('need_id')->references('id')->on('needs')->onDelete('no action');
            $table->integer('custodian_id')->unsigned();
            $table->foreign('custodian_id')->references('id')->on('custodians')->onDelete('no action');
            $table->integer('rep_id')->unsigned();
            $table->foreign('rep_id')->references('id')->on('reps')->onDelete('no action');
            $table->enum('status', array('unpublished','published', 'archived'));
            $table->string('roles');
            $table->string('avatar');
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
        Schema::drop('blocks');
    }
}
