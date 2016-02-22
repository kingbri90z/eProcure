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
                'id' => 5,
                'first_name' => 'Jay',
                'last_name' => 'Dombroski',
                'email' => 'j.dombroski@qilinfinance.com',
                'password' => '',
                'remember_token' => 'RI15gKWYuDJp1rg1gf3J3wQkX4JeQvPRcMXFvgROMAtgP61zAZAeJGbQRwI2',
                'created_at' => '2016-02-17 03:51:34',
                'updated_at' => '2016-02-21 22:36:02',
                'roles' => 'A',
                'avatar' => 'https://lh4.googleusercontent.com/-8UReDmtW0js/AAAAAAAAAAI/AAAAAAAAAFU/RfGdDx8g2nM/photo.jpg',
            ),
            1 => 
            array (
                'id' => 6,
                'first_name' => 'Jay',
                'last_name' => 'Dombroski',
                'email' => 'jay@32marketing.com',
                'password' => '',
                'remember_token' => '6gtkmOx0iPOTDHICkOBVmwNq4COboEHuQDWUnNXzd3aaQtebAqTqBthRqwSc',
                'created_at' => '2016-02-21 22:37:06',
                'updated_at' => '2016-02-22 02:24:24',
                'roles' => 'N',
                'avatar' => 'https://lh3.googleusercontent.com/-h8DX1pdH1ak/AAAAAAAAAAI/AAAAAAAAAfQ/-hIVwr_uBmc/photo.jpg',
            ),
        ));
        
        
    }
}
