<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    public function run()
    {
        $setting = [
            [
                'id'    => 1,
                'banner' => null,
                'about' => null,
                'default_image'=>null
            ],
        ];

        Setting::insert($setting);
    }
}
