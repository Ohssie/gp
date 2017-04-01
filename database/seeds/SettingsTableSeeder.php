<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'name' => 'app_name', 'value' => 'Citisumo'
            ],
            [
                'name' => 'logo_url', 'value' => 'assets/img/logo-xx.png'
            ],
            [
                'name' => 'contact_number', 'value' => '08062856202'
            ],
            [
                'name' => 'contact_email', 'value' => 'info@moneymatrix.com'
            ],
            [
                'name' => 'sms_username', 'value' => 'ugendu04@gmail.com'
            ],
            [
                'name' => 'sms_apikey', 'value' => '88a6c25a71566ad8e4566e95d1c87ecdbdf53e9f'
            ],
            [
                'name' => 'sms_url', 'value' => 'http://api.ebulksms.com/sendsms.json'
            ],
            [
                'name' => 'delete_records_after', 'value' => '2'
            ]
        ]);
    }
}
