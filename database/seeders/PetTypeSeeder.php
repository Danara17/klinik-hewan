<?php

namespace Database\Seeders;

use App\Models\MasterPetType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Anjing',
            'Kucing',
            'Burung',
            'Reptil',
            'Klepet',
            'Ikan',
            'Hewan Eksotis',
            'Hewan Ternak'
        ];

        foreach ($types as $type) {
            MasterPetType::create(['name' => $type]);
        }
    }
}
