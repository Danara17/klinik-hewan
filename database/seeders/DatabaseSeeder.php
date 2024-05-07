<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\InventoryCategory;
use App\Models\MasterPetType;
use App\Models\MasterSpecialization;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Danara Dhasa Caesa',
            'email' => 'dcdanara@gmail.com',
            'password' => Hash::make('Danara123'),
            'role' => 'admin',
            'phone' => '081234463364',
            'address' => 'Permata Safira Regency, Lidah Kulon, Lakarsantri, Surabaya, Jawa Timur, 60213'
        ]);

        User::factory()->create([
            'name' => 'Inelty Adji Faizah',
            'email' => 'ineltyadjiefaizah@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'phone' => '081xxxxxxxxx',
            'address' => 'Pasuruan'
        ]);

        User::factory()->create([
            'name' => 'Danny Lufry Widodo',
            'email' => 'lufry0@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'doctor',
            'phone' => '081xxxxxxxxx',
            'address' => 'Surabaya'
        ]);

        MasterPetType::factory()->create([
            'name' => 'Anjing'
        ]);

        MasterPetType::factory()->create([
            'name' => 'Kucing'
        ]);

        MasterSpecialization::factory()->create([
            'name' => 'Groomer'
        ]);

        MasterSpecialization::factory()->create([
            'name' => 'Sunater'
        ]);

        MasterSpecialization::factory()->create([
            'name' => 'Operater'
        ]);

        Doctor::factory()->create([
            'name' => 'Danny Lufry Widodo',
            'user_id' => 3,
            'specialization_id' => 2,
            'address' => 'Surabaya',
            'phone' => '081xxxxxxxxx'
        ]);

        InventoryCategory::factory()->create([  //1
            'name' => 'Produk'
        ]);

        InventoryCategory::factory()->create([  //2 
            'name' => 'Jasa'
        ]);

        InventoryCategory::factory()->create([  //3
            'name' => 'Obat',
            'parent_id' => 1,
        ]);

        InventoryCategory::factory()->create([  //4
            'name' => 'Obat Ringan',
            'parent_id' => 3,
        ]);

        InventoryCategory::factory()->create([  //5
            'name' => 'Obat Keras',
            'parent_id' => 3,
        ]);

        InventoryCategory::factory()->create([  //6
            'name' => 'Perawatan',
            'parent_id' => 2,
        ]);

        InventoryCategory::factory()->create([  //7
            'name' => 'Operasi Kecil',
            'parent_id' => 2,
        ]);

        InventoryCategory::factory()->create([  //8
            'name' => 'Operasi Besar',
            'parent_id' => 2,
        ]);

        InventoryCategory::factory()->create([  //9
            'name' => 'Pengecekan Kesehatan',
            'parent_id' => 2,
        ]);



    }
}
