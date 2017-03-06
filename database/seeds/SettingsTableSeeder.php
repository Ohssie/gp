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
                'name' => 'app_name', 'value' => 'MoneyMatrix'
            ],
            [
                'name' => 'logo_url', 'value' => 'assets/img/logo-xx.png'
            ],
            [
                'name' => 'contact_number', 'value' => '08181484568'
            ],
            [
                'name' => 'contact_email', 'value' => 'info@moneymatrix.com'
            ],
            [
                'name' => 'sms_username', 'value' => 'kator95@gmail.com'
            ],
            [
                'name' => 'sms_apikey', 'value' => 'c2e1234b2c6a3e2d18aa0336c7777063593f6c37'
            ],
            [
                'name' => 'sms_url', 'value' => 'http://api.ebulksms.com/sendsms.json'
            ]
        ]);
    }
}
