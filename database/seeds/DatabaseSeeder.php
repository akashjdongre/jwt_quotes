<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            AdminTableSeeder::class,
            RoleAdminTableSeeder::class,
            AuthorTableSeeder::class,
            SettingTableSeeder::class,
        ]);
    }


}
