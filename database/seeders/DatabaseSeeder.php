<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::firstOrCreate([
            "nome" => "Admin",
            "siape" => "7654321",
            "email" => "admin@email.com",
            "telefonecelular" => "988518481",
            "cargo" => "Assistênte",
            "setor" => "Informática",
            "siape_verified_at" => null,
            "first_login" => 1,
            "is_admin" => 1
        ]);
    }
}
