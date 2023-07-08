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
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           [
            'username' => 'admin',
            // 'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin'
           ],
           [
            'username' => 'pimpinan',
            // 'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('pimpinan'),
            'role' => 'pimpinan'
           ],
           [
            'username' => 'operator',
            // 'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('operator'),
            'role' => 'operator'
           ],
        ]);
    }
}
