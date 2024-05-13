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
            'name' => 'Muhammad Rafi Prabowo',
            'email' => 'iydrafiprabowo@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '081946708738',
            'address' => 'Pasuruan'
        ]);

        User::factory()->create([
            'name' => 'Geraldi Nathan Tommy Saputra',
            'email' => 'geraldi.tommysaputra03@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'author',
            'phone' => '081255635633',
            'address' => 'Surabaya'
        ]);

        User::factory()->create([
            'name' => 'Jesia Esa Christanti',
            'email' => 'jelitarosse01@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'phone' => '081255635633',
            'address' => 'Surabaya'
        ]);

        User::factory()->create([
            'name' => 'M. Arya Suherman',
            'email' => 'muhammadaryasuherman@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'author',
            'phone' => '081255635633',
            'address' => 'Surabaya'
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'phone' => '081255635633',
            'address' => 'Surabaya'
        ]);

        $this->call([
            SpecializationSeeder::class,
            PetTypeSeeder::class,
            CategorySeeder::class
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
