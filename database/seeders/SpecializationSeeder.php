<?php

namespace Database\Seeders;

use App\Models\MasterSpecialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specializations = [
            'Dokter Hewan Umum',
            'Bedah',
            'Internis',
            'Dermatologi',
            'Oftalmologi',
            'Onkologi',
            'Neurologi',
            'Anestesiologi',
            'Kardiologi',
            'Ortodonti dan Dentistri',
            'Nutrisi',
            'Fisioterapi dan Rehabilitasi',
            'Pemeriksaan Radiologi',
            'Urologi',
            'Palliatif dan Perawatan Terakhir',
        ];

        foreach ($specializations as $specialization) {
            MasterSpecialization::create(['name' => $specialization]);
        }
    }
}
