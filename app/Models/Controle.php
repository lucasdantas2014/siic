<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Controle extends Model
{
    use HasFactory;

    public function pedido(){
        return $this->hasMany(Pedido::class);
    }

    protected $fillable =[
        'marca'
    ];
}
