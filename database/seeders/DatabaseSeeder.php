<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Mentor 1',
            'email' => 'mentor@gmail.com',
            'role' => 'mentor',
            'password' => bcrypt('123'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Mentor 2',
            'email' => 'mentor2@gmail.com',
            'role' => 'mentor',
            'password' => bcrypt('123'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Pegawai',
            'email' => 'pegawai@gmail.com',
            'role' => 'pegawai',
            'password' => bcrypt('123'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Umum',
            'email' => 'umum@gmail.com',
            'role' => 'umum',
            'password' => bcrypt('123'),
        ]);

        \App\Models\Kategori::factory(5)->create();
        \App\Models\Pelatihan::factory(40)->create();
    }
}
