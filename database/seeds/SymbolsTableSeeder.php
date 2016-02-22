<?php

use Illuminate\Database\Seeder;

class SymbolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('symbols')->delete();

        \DB::table('symbols')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => '0416.HK',
                'exchange_id' => 1,
                'created_at' => '2016-02-12 15:57:22',
                'updated_at' => '2016-02-12 15:57:22',
            ),
            1 =>
            array (
                'id' => 1,
                'name' => '2799.HK',
                'exchange_id' => 1,
                'created_at' => '2016-02-12 15:57:22',
                'updated_at' => '2016-02-12 15:57:22',
            ),
        ));


    }
}
