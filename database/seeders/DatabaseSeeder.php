<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\User::factory(1)->create();
        //  \App\Models\Admin::factory(1)->create();

         \App\Models\User::factory()->create([
            'name' => 'User1',
            'email' => 'user1@email.com',
            'email_verified_at' => now(),
            'password' => '12345678', // password
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'User2',
            'email' => 'user2@email.com',
            'email_verified_at' => now(),
            'password' => '12345678', // password
            'remember_token' => Str::random(10),
        ]);

        \App\Models\Admin::factory()->create([
            'name' => 'Admin1',
            'username' => 'Admin1',
            'email' => 'admin1@email.com',
            'email_verified_at' => now(),
            'password' => '12345678', // password
            'remember_token' => Str::random(10),
        ]);

        \App\Models\Admin::factory()->create([
            'name' => 'Admin2',
            'username' => 'Admin2',
            'email' => 'admin2@email.com',
            'email_verified_at' => now(),
            'password' => '12345678', // password
            'remember_token' => Str::random(10),
        ]);

         \App\Models\Tambang::factory()->create([
            'lokasi' => 'Surabaya',
            'user_id' => '1',
        ]);

        \App\Models\Tambang::factory()->create([
            'lokasi' => 'Malang',
            'user_id' => '2',
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

        \App\Models\Kendaraan::factory()->create([
            'nama' => 'Truck D678',
            'jenis' => 'Angkutan Barang',
        ]);

        \App\Models\Driver::factory()->create([
            'nama' => 'Averil',
        ]);

        \App\Models\Driver::factory()->create([
            'nama' => 'Primayuda',
        ]);
    }
}
