<?php

use Illuminate\Database\Seeder;

class CustodiansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('custodians')->delete();
        
        \DB::table('custodians')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'CNY',
                'created_at' => '2016-02-11 01:54:18',
                'updated_at' => '2016-02-11 02:22:40',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'PROM',
                'created_at' => '2016-02-11 02:02:17',
                'updated_at' => '2016-02-11 02:02:17',
            ),
        ));
        
        
    }
}
