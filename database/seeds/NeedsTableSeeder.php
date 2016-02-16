<?php

use Illuminate\Database\Seeder;

class NeedsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('needs')->delete();
        
        \DB::table('needs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Buyer',
                'created_at' => '2016-02-12 15:31:08',
                'updated_at' => '2016-02-12 15:31:08',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Seller',
                'created_at' => '2016-02-12 15:31:23',
                'updated_at' => '2016-02-12 15:31:23',
            ),
        ));
        
        
    }
}
