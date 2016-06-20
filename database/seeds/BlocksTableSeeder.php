<?php

use Illuminate\Database\Seeder;

class BlocksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('blocks')->delete();

        \DB::table('blocks')->insert(array (
            0 =>
            array (
                'id' => 1,
                'symbol_id' => 1,
                'exchange_id' => 1,
                'discount' => '15',
                'number_shares' => '100',
                'need_id' => 2,
                'custodian_id' => 1,
                'rep_id' => 5,
                'created_at' => '2016-02-12 15:57:22',
                'updated_at' => '2016-02-22 02:38:59',
                'status' => 'published',
                'discount_target' => '14',
                'source_id' => 1,
                'user_id' => 5,

            ),
            1 =>
            array (
                'id' => 2,
                'symbol_id' => 2,
                'exchange_id' => 1,
                'discount' => '12',
                'number_shares' => '30',
                'need_id' => 1,
                'custodian_id' => 1,
                'rep_id' => 1,
                'created_at' => '2016-02-12 15:59:02',
                'updated_at' => '2016-02-22 02:23:26',
                'status' => 'published',
                'discount_target' => '10',
                'source_id' => 2,
                'user_id' => 6,

            ),
        ));


    }
}
