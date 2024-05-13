<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Perawatan Hewan',
            'Kesehatan Hewan',
            'Kisah Sukses',
            'Edukasi Pemilik Hewan',
            'Konsultasi Kesehatan Hewan',
            'Prosedur Medis',
            'Informasi Tentang Spesies',
            'Pertanyaan Umum',
        ];

        foreach ($categories as $category) {
            Categories::create([
                'name' => $category,
                'slug' => Str::slug($category), // Generate slug from category name
            ]);
        }
    }
}
