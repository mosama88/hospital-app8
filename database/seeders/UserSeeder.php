<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->delete();
        DB::table('users')->insert([
            'name' => 'Rasha Mousa',
            'email' => 'rmousa@gamil.com',
            'password' => 'password',
        ],
        
    );
   

    DB::table('users')->insert([
        'name' => 'Ahmed Azzoz',
        'email' => 'azooz@gamil.com',
        'password' => 'password',
    ],



);

DB::table('users')->insert([
    'name' => 'Menan Ahmed',
    'email' => 'menan@gamil.com',
    'password' => 'password',
],
);
}
}
