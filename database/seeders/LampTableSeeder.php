<?php

namespace Database\Seeders;

use App\Models\Lamp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LampTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Lamp::create([
            'name' => 'Lampu Teras',
        ]);

        Lamp::create([
            'name' => 'Lampu Tengah',
        ]);

        Lamp::create([
            'name' => 'Lampu Kamar',
        ]);
    }
}
