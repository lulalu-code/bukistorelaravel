<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'User1',
            'email' => 'user1@buki.com',
            'password' => '11111111',
            'zone' => 'Barcelona',
            'profile_image' => 'https://cdn.pixabay.com/photo/2020/06/30/10/23/icon-5355896_1280.png',
        ]);

        User::create([
            'name' => 'User2',
            'email' => 'user2@buki.com',
            'password' => '22222222',
            'zone' => 'Tarragona',
            'profile_image' => 'https://cdn.pixabay.com/photo/2020/06/30/10/23/icon-5355896_1280.png',
        ]);

        User::create([
            'name' => 'User3',
            'email' => 'user3@buki.com',
            'password' => '33333333',
            'zone' => 'Girona',
            'profile_image' => 'https://cdn.pixabay.com/photo/2020/06/30/10/23/icon-5355896_1280.png',
        ]);

        User::create([
            'name' => 'User4',
            'email' => 'user4@buki.com',
            'password' => '44444444',
            'zone' => 'Madrid',
            'profile_image' => 'https://cdn.pixabay.com/photo/2020/06/30/10/23/icon-5355896_1280.png',
        ]);

        User::create([
            'name' => 'User5',
            'email' => 'user5@buki.com',
            'password' => '55555555',
            'zone' => 'Málaga',
            'profile_image' => 'https://cdn.pixabay.com/photo/2020/06/30/10/23/icon-5355896_1280.png',
        ]);
    }
}
