<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'key' => 'home_info_image', 'value' => '',
            ],
            [
                'key' => 'home_info_title', 'value' => '',
            ],
            [
                'key' => 'home_info_about', 'value' => '',
            ],
            [
                'key' => 'about_image', 'value' => '',
            ],
            [
                'key' => 'about_owner_name', 'value' => '',
            ],
            [
                'key' => 'about_content', 'value' => '',
            ],
            [
                'key' => 'facebook_link', 'value' => '',
            ],
            [
                'key' => 'instagram_link', 'value' => '',
            ],
            [
                'key' => 'twitter_link', 'value' => '',
            ],
            [
                'key' => 'youtube_link', 'value' => '',
            ],
            [
                'key' => 'pinterest_link', 'value' => '',
            ],
        ];

        foreach ($settings as $setting) {
            GeneralSetting::firstOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
