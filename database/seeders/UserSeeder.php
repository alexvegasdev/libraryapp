<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function createUsers(array $users, $role)
    {
        foreach ($users as $user){
            $userModel = new User();

            $userModel->dni = $user['dni'];
            $userModel->firstname = $user['firstname'];
            $userModel->lastname = $user['lastname'];
            $userModel->email = $user['email'];
            $userModel->phone = $user['phone'];
            $userModel->password = Hash::make($user['password']);
            $userModel->address = $user['address'];

            $userModel->assignRole($role);

            $userModel->save();
        }
    }


    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    }
}
