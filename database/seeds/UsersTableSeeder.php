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
            'name' => 'Favour James', 
            'username' => 'kjames', 
            'password' => bcrypt('user'), 
            'phone' => '07065963808', 
            'bank_name' => 'First Bank of Nigeria', 
            'account_name' => 'Favour James', 
            'account_number' => '8652865215']);
            
        DB::table('users')->insert([
            'name' => 'Retnan Daser', 
            'username' => 'rdaser', 
            'password' => bcrypt('yahweh'), 
            'phone' => '08161730129', 
            'bank_name' => 'Diamon Bank Nigeria', 
            'account_name' => 'Daser Retnan', 
            'account_number' => '3085242156']);
            
        DB::table('users')->insert([
            'name' => 'Demo User', 
            'username' => 'duser', 
            'password' => bcrypt('yahweh'), 
            'phone' => '08161730128', 
            'bank_name' => 'Demo Bank Nigeria', 
            'account_name' => 'Demo User', 
            'account_number' => '2868614816']);
            
        DB::table('users')->insert([
            'name' => 'Demo User2', 
            'username' => 'duser2', 
            'password' => bcrypt('yahweh'), 
            'phone' => '08161730138', 
            'bank_name' => 'Demo2 Bank Nigeria', 
            'account_name' => 'Demo User2', 
            'account_number' => '2868614818']);
            
            DB::table('users')->insert([
            'name' => 'Demo User3', 
            'username' => 'duser3', 
            'password' => bcrypt('yahweh'), 
            'phone' => '08095356756', 
            'bank_name' => 'Demo2 Bank Nigeria', 
            'account_name' => 'Demo User2', 
            'account_number' => '2868614818']);
            
            DB::table('users')->insert([
            'name' => 'Demo Edie', 
            'username' => 'duser4', 
            'password' => bcrypt('yahweh'), 
            'phone' => '07038602624', 
            'bank_name' => 'Demo3 Bank Nigeria', 
            'account_name' => 'Demo Edie', 
            'account_number' => '8264865164']);
            
            DB::table('users')->insert([
            'name' => 'Demo Nani', 
            'username' => 'duser5', 
            'password' => bcrypt('yahweh'), 
            'phone' => '07035039214', 
            'bank_name' => 'Demo5 Bank Nigeria', 
            'account_name' => 'Demo Nani', 
            'account_number' => '5987256925']);
    }
}
