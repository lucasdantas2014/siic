<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laboratorio;
class LaboratorioController extends Controller
{
    public function store(Request $req){
        $laboratorio = Laboratorio::create([
            'nome' => $req->nome,
            'chave' => $req->nomechave,
            'disponivel' => true
        ]);
        $laboratorio->save();
        return redirect('/home');
    }

    public function devolucao(Request $req){
        
    }
}
