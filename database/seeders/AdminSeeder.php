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
            "nome" => "Professor",
            "siape" => "0409200",
            "password" =>  Hash::make('63524100'),
            "email" => "prof@email.com",
            "telefone" => "996886604",
            "cargo" => "Professor",
            "setor" => "Eng",
            "siape_verified_at" => null,
            "tipo" => User::TIPO_PROFESSOR,
            "is_admin" => 0
        ]);
    }
}
