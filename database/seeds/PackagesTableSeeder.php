<?php

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert([
            'package_id' => '1',
            'package_name' => 'CLASSIC', 
            'color' => 'primary', 
            'cost' => '5000'
        ]);
        
        DB::table('packages')->insert([
            'package_id' => '2',
            'package_name' => 'PROFESSIONAL', 
            'color' => 'warning', 
            'cost' => '10000'
        ]);
        
        DB::table('packages')->insert([
            'package_id' => '3',
            'package_name' => 'PREMIUM', 
            'color' => 'success', 
            'cost' => '20000'
        ]);
        
        DB::table('packages')->insert([
            'package_id' => '4',
            'package_name' => 'ULTIMATE', 
            'color' => 'danger', 
            'cost' => '50000'
        ]);
        
        DB::table('packages')->insert([
            'package_id' => '5',
            'package_name' => 'BOSS', 
            'color' => 'primary', 
            'cost' => '100000'
        ]);
    }
}