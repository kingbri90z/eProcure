<?php

use Illuminate\Database\Seeder;

class SymbolsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
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
                'created_at' => '2016-02-12 15:57:22',
                'updated_at' => '2016-02-12 15:57:22',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => '2799.HK',
                'created_at' => '2016-02-12 15:57:22',
                'updated_at' => '2016-02-12 15:57:22',
            ),
        ));


    }
}
