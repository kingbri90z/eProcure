<?php

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$now = date('Y-m-d H:i:s');
    	DB::table('users')->insert([
            'first_name'    => 'jay',
            'password'      => Hash::make('1234'),
            'email'         => 'jay@dombroski.com',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
    }
}
