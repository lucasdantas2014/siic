<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chave extends Model
{
    use HasFactory;

    public function pedido(){
        return $this->hasMany(Pedido::class);
    }

    const CATEGORIAS = [
            'Mineração',
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
            'Construção de Edifícios'
    ];

    protected $fillable = [
        'nome',
        'categoria',
        'descricao',
        'disponivel',
        'sala_id'
    ];

    public function sala() {
        return $this->hasOne(Sala::class, 'id', 'sala_id');
    }
}
