<?php

use Illuminate\Database\Seeder;
use App\Author;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = [
            [
                'id'    => '1001',
                'custom_id'=>'AUID1001',
                'name' => 'Anonymous',
                'url'  =>'anonymous'
            ],
        ];

        Author::insert($authors);
    }
}
