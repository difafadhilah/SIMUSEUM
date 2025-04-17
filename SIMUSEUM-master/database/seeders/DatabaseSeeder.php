<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use App\Models\BukuTamu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // BukuTamu::factory(100)->create();

        \App\Models\User::factory()->create([
            'name' => 'Superadmin',
            'username' => 'superadmin01',
            'email' => 'superadmin12@gmail.com',
            'role' => 'superadmin',
            'password' => Hash::make('superadmin11')
        ]);
    }
}
