<?php

namespace Database\Seeders;

use App\Models\Sala;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sala::create([
            'nome' => 'Sala 1',
            'descricao' => 'Sala 1 do bloco de aulas',
            'categoria' => 'padrão',
            'disponivel' => true
        ]);

        Sala::create([
            'nome' => 'Sala 2',
            'descricao' => 'Sala 2 do bloco de aulas',
            'categoria' => 'padrão',
            'disponivel' => true
        ]);

        Sala::create([
            'nome' => 'Labortório de informática 1',
            'descricao' => 'Labortório de informática 1',
            'categoria' => 'informátic',
            'disponivel' => true
        ]);
    }
}
