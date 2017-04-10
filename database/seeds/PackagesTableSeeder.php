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
            'depth' => 1,
            'size' => 2,
            'color' => 'primary', 
            'cost' => '5000',
            'description' => 'Classic Package (Five thousand Naira)'
        ]);
        
        DB::table('packages')->insert([
            'package_id' => '2',
            'package_name' => 'PROFESSIONAL',
            'depth' => 1,
            'size' => 2,
            'color' => 'warning', 
            'cost' => '10000',
            'description' => 'Professional Package (Ten thousand Naira)'
        ]);
        
        DB::table('packages')->insert([
            'package_id' => '3',
            'package_name' => 'PREMIUM',
            'depth' => 1,
            'size' => 2,
            'color' => 'success', 
            'cost' => '20000',
            'description' => 'Premium Package (Twenty thousand Naira)'
        ]);
        
        DB::table('packages')->insert([
            'package_id' => '4',
            'package_name' => 'ULTIMATE',
            'depth' => 1,
            'size' => 2,
            'color' => 'danger', 
            'cost' => '50000',
            'description' => 'Ultimate Package (Fifty thousand Naira)'
        ]);
        
        /*DB::table('packages')->insert([
            'package_id' => '5',
            'package_name' => 'BOSS',
            'depth' => 1,
            'size' => 3,
            'color' => 'primary', 
            'cost' => '100000',
            'description' => 'Boss Package (Hundred thousand Naira)'
        ]);*/
    }
}