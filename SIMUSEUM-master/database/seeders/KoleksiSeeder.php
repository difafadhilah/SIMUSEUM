<?php

namespace Database\Seeders;

use App\Models\Koleksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KoleksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Koleksi::factory()->count(10)->create();

    }
}
