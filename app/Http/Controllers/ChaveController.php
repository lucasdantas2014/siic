<?php

namespace App\Http\Controllers;
use App\Models\Chave;
use Illuminate\Http\Request;

class ChaveController extends Controller
{

    public function index(){
        return view('admin.chaves.chaves_admin',['chaves' => Chave::all()]);
    }
    public function indexAdicionar(){
        return view('admin.chaves.adicionarchave');
    }
    public function store(Request $request){

        Chave::create([
            'nome' => $request->nomelab,
            'categoria' => $request->categoria,
            'descricao' => $request->descricao,
            'disponivel' => false
        ]);
//        session()->flash('mensagemLaboratorio' , 'Chave adicionada com sucesso!');
        return redirect()->route('admin_chaves');
    }

    public function editarChavePage($nome) {
        $chave = Chave::where("nome", $nome)
            ->first();

        return view('admin.chaves.editar_chave', ["chave" => $chave]);
    }

    public function editarChave(Request $request) {
        $data = $request->all();
        $user = Chave::where('nome', $data['nome'])
            ->first();

        $user->descricao = $data['descricao'];
        $user->categoria = $data['categoria'];

        $user->save();

        return redirect()->route('admin_chaves');
    }

    public function alterarStatus(String $nome){
        $chave = Chave::where('nome', $nome)
            ->first();

        $chave->disponivel = !$chave->disponivel;

        $chave->save();

        return redirect()->route('admin_chaves');
    }

    public function removerChave(String $nome){
        $chave = Chave::where('nome', $nome)
            ->first();

        $chave->delete();

        return redirect()->route('admin_chaves');
    }

    public function indexDetalhes(Request $request){
        return view('admin.chaves.detalhechave');
    }
}
