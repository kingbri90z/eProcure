<?php

use Illuminate\Database\Seeder;

class OauthIdentitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('oauth_identities')->delete();
        
        \DB::table('oauth_identities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 5,
                'provider_user_id' => '117816073332217427131',
                'provider' => 'google',
                'access_token' => 'ya29.kAJ3c8eemYrvRVvtcPcuA9i6wzHL5CaCm4rFgIe1TjP1EEDOTTvMRnjsNwQYA0fPnjzn6g',
                'created_at' => '2016-02-17 03:51:34',
                'updated_at' => '2016-02-22 02:38:04',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 6,
                'provider_user_id' => '117074684956353866824',
                'provider' => 'google',
                'access_token' => 'ya29.jwIN7cSjc6BOqIrxV_tJ2FlUullpg2HS8h-m77a4cw22qo8UUN80Hm6kirRxSII7eTcc',
                'created_at' => '2016-02-21 22:37:06',
                'updated_at' => '2016-02-21 22:37:06',
            ),
        ));
        
        
    }
}
