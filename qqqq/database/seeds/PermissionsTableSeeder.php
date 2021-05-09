<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {

        $permissions = [
            [
                'id'    => '1',
                'title' => 'role_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'client_create',
            ],
            [
                'id'    => '13',
                'title' => 'client_edit',
            ],
            [
                'id'    => '14',
                'title' => 'client_show',
            ],
            [
                'id'    => '15',
                'title' => 'client_delete',
            ],
            [
                'id'    => '16',
                'title' => 'client_access',
            ],
            [
                'id'    => '17',
                'title' => 'quote_create',
            ],
            [
                'id'    => '18',
                'title' => 'quote_edit',
            ],
            [
                'id'    => '19',
                'title' => 'quote_show',
            ],
            [
                'id'    => '20',
                'title' => 'quote_delete',
            ],
            [
                'id'    => '21',
                'title' => 'quote_access',
            ],
            [
                'id'    => '22',
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => '23',
                'title' => 'sub_admin_create',
            ],
            [
                'id'    => '24',
                'title' => 'sub_admin_edit',
            ],
            [
                'id'    => '25',
                'title' => 'sub_admin_show',
            ],
            [
                'id'    => '26',
                'title' => 'sub_admin_delete',
            ],
            [
                'id'    => '27',
                'title' => 'sub_admin_access',
            ],
            [
                'id'    => '28',
                'title' => 'tag_create',
            ],
            [
                'id'    => '29',
                'title' => 'tag_edit',
            ],
            [
                'id'    => '30',
                'title' => 'tag_show',
            ],
            [
                'id'    => '31',
                'title' => 'tag_delete',
            ],
            [
                'id'    => '32',
                'title' => 'tag_access',
            ],
            [
                'id'    => '33',
                'title' => 'category_create',
            ],
            [
                'id'    => '34',
                'title' => 'category_edit',
            ],
            [
                'id'    => '35',
                'title' => 'category_show',
            ],
            [
                'id'    => '36',
                'title' => 'category_delete',
            ],
            [
                'id'    => '37',
                'title' => 'category_access',
            ],
            [
                'id'    => '38',
                'title' => 'category_management_access',
            ],
            [
                'id'    => '39',
                'title' => 'top_category_access',
            ],
            [
                'id'    => '40',
                'title' => 'top_category_update',
            ],
            [
                'id'    => '41',
                'title' => 'tag_management_access',
            ],
            [
                'id'    => '42',
                'title' => 'trending_tag_access',
            ],
            [
                'id'    => '43',
                'title' => 'trending_tag_update',
            ],
            [
                'id'    => '44',
                'title' => 'popular_tag_access',
            ],
            [
                'id'    => '45',
                'title' => 'popular_tag_update',
            ],
            [
                'id'    => '46',
                'title' => 'author_management_access',
            ],
            [
                'id'    => '47',
                'title' => 'author_create',
            ],
            [
                'id'    => '48',
                'title' => 'author_edit',
            ],
            [
                'id'    => '49',
                'title' => 'author_show',
            ],
            [
                'id'    => '50',
                'title' => 'author_delete',
            ],
            [
                'id'    => '51',
                'title' => 'author_access',
            ],
            [
                'id'    => '52',
                'title' => 'popular_author_access',
            ],
            [
                'id'    => '53',
                'title' => 'popular_author_update',
            ],
            [
                'id'    => '54',
                'title' => 'blog_create',
            ],
            [
                'id'    => '55',
                'title' => 'blog_edit',
            ],
            [
                'id'    => '56',
                'title' => 'blog_show',
            ],
            [
                'id'    => '57',
                'title' => 'blog_delete',
            ],
            [
                'id'    => '58',
                'title' => 'blog_access',
            ],
            [
                'id'    => '59',
                'title' => 'keyword_create',
            ],
            [
                'id'    => '60',
                'title' => 'keyword_edit',
            ],
            [
                'id'    => '61',
                'title' => 'keyword_show',
            ],
            [
                'id'    => '62',
                'title' => 'keyword_delete',
            ],
            [
                'id'    => '63',
                'title' => 'keyword_access',
            ],
            [
                'id'    => '64',
                'title' => 'setting_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
