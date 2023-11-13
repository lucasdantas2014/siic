<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pedido;
use Carbon\Carbon;
use App\Models\Chave;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use PhpParser\Node\Scalar\String_;

class UserController extends Controller
{
    public function index(){
        return view('admin.usuarios.usuarios',['users' => User::all()]);
    }
    public function cadastrarUsuarioPage (){
        return view('admin.usuarios.adicionar_usuario');
    }

    public function cadastrarUsuario(Request $request){

        $data = $request->all();
        User::firstOrCreate(
            [
                'siape' => $data['siape'],
            ],
            [
                'nome' => $data['nome'],
                'password' => Hash::make($data['password']),
                'email' => $data['email'],
                'telefone' => $data['telefone'],
                'cargo' => $data['cargo'],
                'setor' => $data['setor'],
                'tipo' => $data['tipo']
        ]);

        return redirect()->route('admin_usuarios');
    }

    public function editarUsuarioPage (String $siape){
        $user = User::where("siape", $siape)
            ->first();

        return view('admin.usuarios.editar_usuario', ["usuario" => $user]);
    }

    public function editarUsuario(Request $request){

        $data = $request->all();
        $user = User::where('siape', $data['siape'])
            ->first();

        $user->nome = $data['nome'];
        $user->email = $data['email'];
        $user->telefone = $data['telefone'];
        $user->cargo = $data['cargo'];
        $user->setor = $data['setor'];

        $user->save();

        return redirect()->route('admin_usuarios');
    }


    public function removerUsuario(String $siape){
        $user = User::where('siape', $siape)
            ->first();

        $user->delete();

        return redirect()->route('admin_usuarios');
    }


    public function homePage(Request $request){

        $pedidos = Pedido::where('status', Pedido::STATUS_PENDENTE)
            ->get();
        return view('publico.index_publico',['pedidos' => $pedidos]);
    }

    public function trocarSenhaUsuario(){
        return view('admin.usuarios.trocarsenhausuario');
    }

    public function storeTrocaSenha(Request $request){

        $request->validate([
            'siape' => 'required|numeric|digits:7',
            'senhanova' => 'required|numeric'
        ],[
            'siape.required' => 'Você precisa digitar o SIAPE!',
            'siape.numeric' => "O SIAPE é composto apenas de números!",
            'siape.digits:7' => "O SIAPE só possui 7 dígitos",
            'senhanova.required' => "Você precisa digitar a senha nova!",
            'senhanova.numeric' => "A senha só é composta de números!"
        ]);
        $user = User::where('siape',$request->siape)->get()->first();
        $user->update([
            'password' => Hash::make($request->senhanova)
        ]);
        session()->flash('mensagemTroca','Senha trocada com sucesso!');
        return redirect()->route('dashboard');
    }
}
