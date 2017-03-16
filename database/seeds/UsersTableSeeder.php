<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['name' => 'Kator James', 'username' => 'kjames', 'password' => bcrypt('user'), 'phone' => '08181484568', 'bank_name' => 'First Bank of Nigeria', 'account_name' => 'Kator James', 'account_number' => '3062027419']);
    }
}
