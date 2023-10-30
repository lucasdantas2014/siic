<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sala;
use App\Models\Chave;
use App\Models\Pedido;

class SalaController extends Controller
{
    public function index(){

        $salas = Sala::all();

        return view("admin.salas.salas", ["salas" => $salas]);
    }

    public function cadastrarPage(){
        return view('admin.salas.adicionar_sala');
    }

    public function store(Request $request) {
        $nome = $request->input('nome');
        $categoria = $request->input('categoria');
        $descricao = $request->input('descricao');

        Sala::firstOrCreate([
            'nome' => $nome,
            'descricao' => $descricao,
            'categoria' => $categoria
        ], [
            'disponievl' => true
        ]);

        return redirect()->route('admin_salas');
    }

    public function editarPage($nome) {
        $sala = Sala::where("nome", $nome)
            ->first();

        return view('admin.salas.editar_sala', ["sala" => $sala]);
    }

    public function editar(Request $request) {
        $sala_id = $request->input('sala_id');
        $nome = $request->input('nome');
        $categoria = $request->input('categoria');
        $descricao = $request->input('descricao');

        $sala = Sala::where("id", $sala_id)
            ->first();

        $sala->nome = $nome;
        $sala->categoria = $categoria;
        $sala->descricao = $descricao;

        $sala->save();

        return redirect()->route('admin_salas');
    }

    public function alterarStatus(String $nome){
        $sala = Sala::where('nome', $nome)
            ->first();

        $sala->disponivel = !$sala->disponivel;

        $sala->save();

        return redirect()->route('admin_salas');
    }

    public function remover(String $nome){
        $sala = Sala::where('nome', $nome)
            ->first();

            // dd($sala);

        $chaves = Chave::where('sala_id', $sala->id);

        foreach($chaves->get() as $chave) {
            Pedido::where('chave_id', $chave->id)->delete();
        }

        $chaves->delete();

        $sala->delete();

        return redirect()->route('admin_salas');
    }
}
