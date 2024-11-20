<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminData = [
            "name" => "Keto Punjabi",
            "email" => "admin@ketopunjabi.com",
            "password" => Hash::make("qwerty123"),
        ];
        User::updateOrCreate($adminData);
    }
}
