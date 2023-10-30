<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;

    const CATEGORIAS = [
        'Padrão',
        'Física',
        'Matematica',
        'Linguagens e Códigos',
        'Biologia',
        'Humanas',
        'Ginásio',
        'Petróleo e Gás',
        'Informática',
        'Quimíca',
        'Ambiente Administrativo',
        'Construção de Edifícios',
        'Outro'
    ];

    protected $table = 'salas';

    protected $fillable = [
        'nome',
        'categoria',
        'descricao',
        'disponivel'
    ];
}
