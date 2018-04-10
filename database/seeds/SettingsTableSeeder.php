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
        $user = App\Settings::create([
            'site_name' => 'Laravel s blog',
            'address' => 'My address',
            'contact_number' => '03242728323',
            'contact_email' => 'info@email.com'

        ]);
    }
}
