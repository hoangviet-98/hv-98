<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        DB::table('admins')->insert([
            'name' => 'HoangViet',
            'email' => 'vietht098@gmail.com',
            'phone' => '0965158092',
            'password' => Hash::make('hoangtheviet')
        ]);
    }
}
