<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
   
class CreateUsersSeeder extends Seeder
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
               'name'=>'Admin',
               'email'=>'admin@yopmail.com',
                'is_admin'=>'1',
               'password'=> bcrypt('admin'),
            ],
            [
               'name'=>'Aahutosh',
               'email'=>'aashutosh@youmail.com',
                'is_admin'=>'0',
               'password'=> bcrypt('user'),
            ],
            [
               'name'=>'Chetan',
               'email'=>'chetan@youmail.com',
                'is_admin'=>'0',
               'password'=> bcrypt('user'),
            ],
            [
               'name'=>'Div',
               'email'=>'div@youmail.com',
                'is_admin'=>'0',
               'password'=> bcrypt('user'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}