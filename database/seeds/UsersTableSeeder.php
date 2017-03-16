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
        DB::table('users')->insert([
            'name' => 'Kator James', 
            'username' => 'kjames', 
            'password' => bcrypt('user'), 
            'phone' => '08181484568', 
            'bank_name' => 'First Bank of Nigeria', 
            'account_name' => 'Kator James', 
            'account_number' => '3062027419']);
            
        DB::table('users')->insert([
            'name' => 'Retnan Daser', 
            'username' => 'rdaser', 
            'password' => bcrypt('yahweh'), 
            'phone' => '08161730129', 
            'bank_name' => 'Diamon Bank Nigeria', 
            'account_name' => 'Daser Retnan', 
            'account_number' => '3085242156']);
    }
}
