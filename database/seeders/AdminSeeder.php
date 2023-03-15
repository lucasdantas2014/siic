<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            "nome" => "Admin",
            "siape" => "7654321",
            "password" =>  Hash::make('12345678'),
            "email" => "admin@email.com",
            "telefone" => "988518481",
            "cargo" => "Assistênte",
            "setor" => "Informática",
            "siape_verified_at" => null,
            "first_login" => 1,
            "is_admin" => 1
        ]);
    }
}
