<?php

use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('notes')->delete();
        
        \DB::table('notes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'block_id' => 1,
                'user_id' => 5,
                'body' => 'this is a test',
                'uid' => '',
                'created_at' => '2016-02-18 13:49:17',
                'updated_at' => '2016-02-18 13:49:17',
            ),
            1 => 
            array (
                'id' => 2,
                'block_id' => 1,
                'user_id' => 5,
                'body' => 'this is my second comment.',
                'uid' => '',
                'created_at' => '2016-02-18 22:11:23',
                'updated_at' => '2016-02-18 22:11:23',
            ),
            2 => 
            array (
                'id' => 3,
                'block_id' => 1,
                'user_id' => 5,
                'body' => 'this is my third comment',
                'uid' => '',
                'created_at' => '2016-02-18 23:46:55',
                'updated_at' => '2016-02-18 23:46:55',
            ),
            3 => 
            array (
                'id' => 4,
                'block_id' => 1,
                'user_id' => 5,
                'body' => 'this is my 4th comment',
                'uid' => '',
                'created_at' => '2016-02-19 02:09:12',
                'updated_at' => '2016-02-19 02:09:12',
            ),
            4 => 
            array (
                'id' => 5,
                'block_id' => 1,
                'user_id' => 5,
                'body' => 'hey, 5ht comment',
                'uid' => '',
                'created_at' => '2016-02-19 02:10:15',
                'updated_at' => '2016-02-19 02:10:15',
            ),
            5 => 
            array (
                'id' => 6,
                'block_id' => 1,
                'user_id' => 5,
                'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'uid' => '',
                'created_at' => '2016-02-19 23:11:44',
                'updated_at' => '2016-02-19 23:11:44',
            ),
            6 => 
            array (
                'id' => 7,
                'block_id' => 1,
                'user_id' => 5,
                'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ',
                'uid' => '',
                'created_at' => '2016-02-19 23:12:00',
                'updated_at' => '2016-02-19 23:12:00',
            ),
            7 => 
            array (
                'id' => 8,
                'block_id' => 1,
                'user_id' => 5,
                'body' => 'asdf',
                'uid' => '',
                'created_at' => '2016-02-19 23:12:07',
                'updated_at' => '2016-02-19 23:12:07',
            ),
            8 => 
            array (
                'id' => 9,
                'block_id' => 1,
                'user_id' => 5,
                'body' => 'kjhhkjkjhj',
                'uid' => '',
                'created_at' => '2016-02-19 23:31:06',
                'updated_at' => '2016-02-19 23:31:06',
            ),
        ));
        
        
    }
}
