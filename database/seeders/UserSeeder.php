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
            'name' => 'Bimbo',
            'email' => 'bimbo@bimbo.com',
            'password' => 'xxx',
            'zone' => 'El Vendrell'
        ]);

        User::create([
            'name' => 'Muami',
            'email' => 'muami@bimbo.com',
            'password' => 'xxx',
            'zone' => 'La Garrotxa'
        ]);

        User::create([
            'name' => 'Lulu',
            'email' => 'lulu@bimbo.com',
            'password' => 'xxx',
            'zone' => 'Bendrell'
        ]);
    }
}
