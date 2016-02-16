<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        $this->call('BlocksTableSeeder');
        $this->call('CustodiansTableSeeder');
        $this->call('ExchangesTableSeeder');
        $this->call('NeedsTableSeeder');
        $this->call('NotesTableSeeder');
        $this->call('PasswordResetsTableSeeder');
        $this->call('RepsTableSeeder');
        $this->call('RoleUserTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('UsersTableSeeder');
    }
}
