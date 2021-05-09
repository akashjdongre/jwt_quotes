<?php

use App\Admin;
use Illuminate\Database\Seeder;

class RoleAdminTableSeeder extends Seeder
{
    public function run()
    {
        Admin::findOrFail(1001)->roles()->sync(1);
    }
}
