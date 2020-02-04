<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'profile' => 'img10.jpg',
            'phone' => '09123456789',
            'address' =>'pyay',
            'dob' => '2000-01-01',
            'create_user_id' => '1',
            'updated_user_id' => '1',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
