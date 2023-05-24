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
            'jenis' => 'Angkutan Barang',
            'status' => 'Tersedia',
            'kepemilikan' => 'Milik Perusahaan',
            'tambang_id' => '1',
        ]);

        \App\Models\Driver::factory()->create([
            'nama' => 'Averil Primayuda',
        ]);

        \App\Models\PemesananKendaraan::factory()->create([
            'driver_id' => '1',
            'admin_id' => '1',
            'kendaraan_id' => '1',
        ]);
    }
}
