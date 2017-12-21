<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Waleed Ahmad',
            'email' => 'waleedgplus@gmail.com',
            'password' => bcrypt('binarystar'),
            'role'  =>  'admin',
            'phone_no' => '03014377011',
            'gender'    =>  'male',
            'image_uri' =>  'default/male.jpg'
        ]);

        echo 'Admins Seeded';
    }
}
