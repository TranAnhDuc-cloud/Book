<?php

use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(User::class,20)->create();
        User::create([
            'username' => 'admin',
            'firt_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@gmail.com',
            'address' => 'abcbab123',
            'is_staff' =>'1',
            'is_active' => '1',
            'data_joined' => date('1990/10/10 , 10:12:10'),
            'is_superuser' => '1',
            'email_verified_at' => now(),
            'password' => bcrypt('1'), // password
            'remember_token' => rand(1,10),
        ]);
    }

}
