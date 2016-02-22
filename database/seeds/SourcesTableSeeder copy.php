<?php

use Illuminate\Database\Seeder;

class SourcesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

// +-------------+------------------------+------+-----+---------+----------------+
// | Field       | Type                   | Null | Key | Default | Extra          |
// +-------------+------------------------+------+-----+---------+----------------+
// | id          | int(10) unsigned       | NO   | PRI | NULL    | auto_increment |
// | name        | varchar(255)           | NO   |     | NULL    |                |
// | type        | enum('blocks','loans') | NO   |     | NULL    |                |
// | relation_id | int(10) unsigned       | NO   |     | NULL    |                |
// | created_at  | timestamp              | YES  |     | NULL    |                |
// | updated_at  | timestamp              | YES  |     | NULL    |                |
// +-------------+------------------------+------+-----+---------+----------------+
        \DB::table('sources')->delete();

        \DB::table('sources')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Broker',
                'type' => 'blocks',
                'relation_id' => null,
                'created_at' => '2016-02-12 15:57:22',
                'updated_at' => '2016-02-12 15:57:22',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Agent',
                'type' => 'blocks',
                'relation_id' => null,
                'created_at' => '2016-02-12 15:57:22',
                'updated_at' => '2016-02-12 15:57:22',
            ),
        ));


    }
}
