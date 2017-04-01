<?php

use Illuminate\Database\Seeder;

class PackagesSubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('package_subscription')->insert([
            'package_id' => 1,
            'username' => 'ifendi17',
            'upline_username' => '',
            'sub_key' => 'GRXBT2fpna', 
            'status' => 'completed',
        ]);
        
        DB::table('package_subscription')->insert([
            'package_id' => 2,
            'username' => 'ifendi17',
            'upline_username' => '',
            'sub_key' => 'UfHwRF2BSz', 
            'status' => 'completed',
        ]);
        
        DB::table('package_subscription')->insert([
            'package_id' => 3,
            'username' => 'ifendi17',
            'upline_username' => '',
            'sub_key' => 'D1X89M95Kc', 
            'status' => 'completed',
        ]);
        
        DB::table('package_subscription')->insert([
            'package_id' => 4,
            'username' => 'ifendi17',
            'upline_username' => '',
            'sub_key' => 'V7G7j0D2Tg', 
            'status' => 'completed',
        ]);
        
        DB::table('package_subscription')->insert([
            'package_id' => 5,
            'username' => 'ifendi17',
            'upline_username' => '',
            'sub_key' => 'iVXpXpVPCI', 
            'status' => 'completed',
        ]);
    }
}
