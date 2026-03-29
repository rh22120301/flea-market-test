<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert
        ([ 
            [ 
                'id' => 1,
                'name' => '出品ユーザー例', 
                'email' => 'test@example.com',
                'password' => Hash::make('12345678'), 
                'created_at' => now(), 
                'updated_at' => now(), 
            ], 
            [ 
                'id' => 2,
                'name' => 'サンプルユーザー', 
                'email' => 'sample@email',
                'password' => Hash::make('aaaaaaaa'), 
                'created_at' => now(), 
                'updated_at' => now(), 
            ], 
        ]);
    }
}
