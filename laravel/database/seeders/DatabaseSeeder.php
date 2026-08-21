<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Seed Roles
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'user', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 2. Seed Users
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin System',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role_id' => 1, // Mengacu ke role admin
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 3. Seed Profiles
        DB::table('profiles')->insert([
            'id' => 1,
            'umur' => 25,
            'bio' => 'Administrator Website',
            'alamat' => 'Jakarta',
            'user_id' => 1, // Mengacu ke user_id 1
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 4. Seed Genres
        DB::table('genres')->insert([
            ['id' => 1, 'nama' => 'Action', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'nama' => 'Drama', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 5. Seed Casts
        DB::table('casts')->insert([
            'id' => 1,
            'nama' => 'Iko Uwais',
            'umur' => 41,
            'bio' => 'Aktor laga Indonesia',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 6. Seed Films
        DB::table('films')->insert([
            'id' => 1,
            'judul' => 'The Raid',
            'ringkasan' => 'Misi penggerebekan gedung tua',
            'tahun' => 2011,
            'poster' => 'theraid.jpg',
            'genre_id' => 1, // Action
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 7. Seed Perans
        DB::table('perans')->insert([
            'id' => 1,
            'film_id' => 1,
            'cast_id' => 1,
            'nama' => 'Rama',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 8. Seed Kritiks
        DB::table('kritiks')->insert([
            'id' => 1,
            'user_id' => 1,
            'film_id' => 1,
            'content' => 'Film aksi yang sangat seru!',
            'point' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}