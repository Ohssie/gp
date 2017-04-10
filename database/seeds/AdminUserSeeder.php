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
        DB::table('users')->insert(['name' => 'Ayesha Danjuma', 'username' => 'ifendi17', 'password' => bcrypt('admin'), 'phone' => '07062193996', 'bank_name' => 'Guaranty Trust Bank', 'account_name' => 'Ayesha Fred', 'account_number' => '0026058761', 'role' => 'admin', 'email' => 'ugendu04@gmail.com', 'phone2' => '07012345678', 'gender' => 'Male']);
    }
}
