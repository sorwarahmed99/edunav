<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Sorwar Ahmed',
               'email'=>'sorwar@admin.test',
               'is_admin'=>'1',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Sorwar Ahmed',
               'email'=>'sorwar@user.test',
               'is_admin'=>'0',
               'password'=> bcrypt('123456'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
