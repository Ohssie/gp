<?php

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['name' => 'Admin Admin', 'username' => 'admin', 'password' => bcrypt('admin'), 'phone' => '08133225610', 'bank_name' => 'First Bank of Nigeria', 'account_name' => 'Kator James', 'account_number' => '3062027419', 'role' => 'admin']);
    }
}
