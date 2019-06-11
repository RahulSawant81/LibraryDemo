<?php

use Illuminate\Database\Seeder;

class CreateAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'id' => 1,
            'is_admin' => 1,
            'name' => 'Admin',
            'email' => 'rahulswnt81@gmail.com',
            'mobile_no' => '9881034044',
            'password' => bcrypt('123456'),
        ]);
    }
}
