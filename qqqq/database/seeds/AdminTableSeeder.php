<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    public function run()
    {
        $admin = [
            [
                'id'             => 1001,
                'name'           => 'Super Admin',
                'email'          => 'dios.abhishekupadhyay@gmail.com',
                'password'       => '$2y$10$rGdpyUs6N7e4xsCsCVos6Ogjabq2kI0ISQY/yjMaAjiYnLaQbhZhi',
                'remember_token' => null,
                'simple_pass'    => 'Password@*12345',
                'custom_id'      => 'SAID1000'
            ],
        ];

        Admin::insert($admin);
    }
}
