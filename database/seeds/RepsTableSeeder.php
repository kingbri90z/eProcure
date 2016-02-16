<?php

use Illuminate\Database\Seeder;

class RepsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('reps')->delete();
        
        \DB::table('reps')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Andy',
                'created_at' => '2016-02-11 02:32:33',
                'updated_at' => '2016-02-11 02:32:33',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Tiger',
                'created_at' => '2016-02-11 02:32:38',
                'updated_at' => '2016-02-11 02:32:46',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Morgan',
                'created_at' => '2016-02-11 02:33:18',
                'updated_at' => '2016-02-11 02:33:18',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Rob',
                'created_at' => '2016-02-12 04:15:20',
                'updated_at' => '2016-02-12 04:15:39',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Ray',
                'created_at' => '2016-02-12 04:16:43',
                'updated_at' => '2016-02-12 04:18:41',
            ),
        ));
        
        
    }
}
