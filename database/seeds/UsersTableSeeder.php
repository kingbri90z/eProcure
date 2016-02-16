<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 2,
                'first_name' => 'jay',
                'last_name' => 'deee',
                'email' => 'jay@dombroski.com',
                'password' => '$2y$10$r5zLl0z.PAg5fl80hjsNz.QzL3R/mrfsVmTZVEC2fBRI1E4kMO.O.',
                'remember_token' => NULL,
                'created_at' => '2016-02-08 20:58:44',
                'updated_at' => '2016-02-10 03:46:01',
            ),
            1 => 
            array (
                'id' => 4,
                'first_name' => 'Morgan',
                'last_name' => 'Wilbur',
                'email' => 'm.wilbur@qilinfinance.com',
                'password' => '$2y$10$KUhriiTXWEN5y5P6WVJrB.T5wtYHTSb099ockmoQiOjiIDi4UBJK2',
                'remember_token' => NULL,
                'created_at' => '2016-02-09 03:44:11',
                'updated_at' => '2016-02-09 03:44:11',
            ),
        ));
        
        
    }
}
