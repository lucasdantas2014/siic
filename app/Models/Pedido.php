<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    const STATUS_DEVOLVIDO = 0,
        STATUS_PENDENTE = 1;

    const TIPOS_STATUS = [
        self::STATUS_DEVOLVIDO => 'devolvido',
        self::STATUS_PENDENTE => 'pendente'
    ];

    public function chave(){
        return $this->belongsTo(Chave::class);
    }

    public function controle(){
        return $this->belongsTo(Controle::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'chave_id',
        'controle',
        'status',
        'outros_materiais',
        'data_inicio' ,
        'data_fim' ,
        'observacoes'
    ];
}
