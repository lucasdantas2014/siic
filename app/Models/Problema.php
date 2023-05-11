<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problema extends Model
{
    use HasFactory;

    protected $table = 'problemas';

    const STATUS_PENDENTE = 0,
        STATUS_RESOLVIDO = 1;

    const TIPOS_STATUS = [
        self::STATUS_PENDENTE => 'pendente',
        self::STATUS_RESOLVIDO => 'resolvido'
    ];

    public function sala(){
        return $this->belongsTo(Sala::class);
    }

    public function controle(){
        return $this->belongsTo(Controle::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'status',
        'titulo',
        'descricao',
        'data_resolvido',
        'sala_id',
        'tecnico_id'
    ];
}
