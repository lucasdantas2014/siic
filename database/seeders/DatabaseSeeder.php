<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            "nome" => "Admin",
            "siape" => "7654321",
            "password" => Hash::make('123456'),
            "telefone" => "1111-1111",
            "email" => "admin@email.com",
            "cargo" => "Assistênte",
            "setor" => "Informática",
            "siape_verified_at" => null,
            "is_admin" => 1
        ]);
    }
}
