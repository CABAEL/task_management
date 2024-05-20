<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $db = DB::table('users')->insert
        (
            [
            'fname' => 'fnameadmin',
            'mname' => 'mnameadmin',
            'lname' => 'lnameadmin',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'role_id' => 1,
            'created_by' => 0
            ],
        );


    }
}
