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
        if (!Schema::hasTable('blocks')) {
            Schema::create('blocks', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('symbol_id')->unsigned();
                $table->foreign('symbol_id')->references('id')->on('symbols')->onDelete('no action');
                $table->integer('exchange_id')->unsigned();
                $table->string('discount');
                $table->string('number_shares');
                $table->string('discount_target');
                $table->integer('need_id')->unsigned();
                $table->foreign('need_id')->references('id')->on('needs')->onDelete('no action');
                $table->integer('source_id')->unsigned();
                $table->foreign('source_id')->references('id')->on('sources')->onDelete('no action');
                $table->integer('custodian_id')->unsigned();
                $table->foreign('custodian_id')->references('id')->on('custodians')->onDelete('no action');
                $table->integer('rep_id')->unsigned();
                $table->foreign('rep_id')->references('id')->on('reps')->onDelete('no action');
                $table->enum('status', array('unpublished','published', 'archived'));
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
        if (Schema::hasTable('blocks')) {
            Schema::drop('blocks');
        }
    }
}
