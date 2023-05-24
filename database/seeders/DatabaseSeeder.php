<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(1)->create();
         \App\Models\Admin::factory(1)->create();

         \App\Models\Tambang::factory()->create([
            'lokasi' => 'Jakarta',
            'user_id' => '1',
        ]);

        \App\Models\Kendaraan::factory()->create([
            'nama' => 'Truck B234',
            'jenis' => 'Angkutan Barang',
        ]);

        \App\Models\Kendaraan::factory()->create([
            'nama' => 'Innova A123',
            'jenis' => 'Angkutan Orang',
        ]);

        \App\Models\Kendaraan::factory()->create([
            'nama' => 'Truck C456',
            'jenis' => 'Angkutan Barang',
        ]);

        \App\Models\Kendaraan::factory()->create([
            'nama' => 'Innova D567',
            'jenis' => 'Angkutan Orang',
        ]);

        \App\Models\Driver::factory()->create([
            'nama' => 'Averil Primayuda',
        ]);
    }
}
