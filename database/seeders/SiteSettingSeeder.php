<?php

namespace Database\Seeders;

use App\Models\SiteSettings;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run()
    {
        SiteSettings::updateOrInsert(['id' => 1], [
            'phone' => '0828032304',
            'email' => 'markjc@mweb.co.za',
            'address' => '29 Majuba Avenue Quellerina',
            'logo' => 'images/cogshighlitedwithglow.png',
            'footer_note' => 'PMWay',
        ]);
    }
}
