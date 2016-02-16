<?php

use Illuminate\Database\Seeder;

class ExchangesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('exchanges')->delete();
        
        \DB::table('exchanges')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Hong Kong Stock Exchange',
                'abbreviation' => 'HKE',
                'created_at' => '2016-02-12 04:17:57',
                'updated_at' => '2016-02-12 04:17:57',
            ),
        ));
        
        
    }
}
