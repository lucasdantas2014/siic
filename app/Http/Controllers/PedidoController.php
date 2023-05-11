<?php

namespace App\Http\Controllers;
use App\Models\Pedido;
use App\Models\Problema;
use App\Models\Sala;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chave;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\LoginCorreto;
use App\Rules\SiapeCorreto;
use App\Rules\ChaveExiste;
use App\Rules\SiapeExiste;
use App\Rules\ChaveAtiva;
use App\Rules\ChaveInativa;
use App\Rules\SenhaCorreta;
use App\Rules\SiapeUsuario;
use Illuminate\Validation\Rule;

class PedidoController extends Controller
{

    public function index(){
        return view("admin.pedidos.emprestimo");

    }
    public function registrarEmprestimo(Request $request){

//        $validacao = $request->validate([
//            'categoria' => ['required',Rule::notIn(['#'])],
//            'chave' =>['bail','required',Rule::notIn(['#']),new ChaveExiste($chave),new ChaveAtiva($chave)],
//            'controle' => ['required'],
//            'material_extra'=> ['required']
//        ],[
//            'nomechave.required' => "Você precisa digitar o nome da chave!",
//            'controle.required' => "Você precisa digitar um controle!",
//            'material_extra.required' => "Você precisa digitar o material extra que será usado!",
//            'categoria.not_in' => 'Você precisa selecionar uma categoria!',
//            'nomechave.not_in' => 'Você precisa selecionar um laboratório!'
//        ]);


        $useId = User::where('siape', $request->input('siape'))
            ->first()
            ->id;

        $dados = Pedido::create([
            'user_id' => $useId,
            'chave_id' => $request->chave,
//            'controle' => $request->controle,
            'status' => Pedido::STATUS_PENDENTE,
            'outros_materiais' => $request->material_extra,
            'devolvido_em' => null,
            'observacoes' => ""
        ]);

        $chave = Chave::find($request->chave);

        $chave->disponivel = false;
        $chave->save();
        session()->flash('mensagem','Pedido feito com sucesso!');
        session()->flash('dados',$dados);
       return redirect()->route('admin_dashboard');
    }

    public function devolucaoIndex(){

        $chaves = Chave::where('disponivel', false)->get();

        return view('admin.devolucao.devolucao', ['chaves' => $chaves]);
    }

    public function registrarDevolucao(Request $request){
        $chave = Chave::find($request->chave);
//        $validacao = $request->validate([
//            'categoria' => ['required',Rule::notIn(['#'])],
//            'nomechave' =>['bail','required',Rule::notIn(['#']),new ChaveInativa($chave),new ChaveExiste($chave)],
//        ],[
//            'nomechave.required' => "Você precisa digitar o nome da chave!",
//            'categoria.not_in' => 'Você precisa selecionar uma categoria!',
//            'nomechave.not_in' => 'Você precisa selecionar um laboratório!'
//        ]);

        $userId = User::where('siape', $request->siape)
            ->first()
            ->id;

        $pedido = Pedido::where('chave_id',$request->chave)
            ->where('user_id', $userId)
            ->where('status', Pedido::STATUS_PENDENTE)->first();

//        $validaUser = $request->validate([
//            'keyusuario' => ['required',new SiapeExiste($request->keyusuario,$pedido),'numeric','digits:7']
//        ],[
//            'keyusuario.required' => 'Você precisa digitar o SIAPE!',
//            'keyusuario.numeric' => 'O SIAPE só é composto por números!',
//            'keyusuario.digits' => 'O SIAPE só é composto por 7 dígitos!',
//        ]);

        $pedido->status = false;
        if($request->problema == ""){
            $pedido->observacoes = "Nenhum";
        }else{
            $pedido->observacoes = $request->problema;
            $problema = new Problema();
//            dd($pedido->chave->nome);
            $problema->firstOrCreate([
                'titulo' => 'Problema - reserva: ' . $pedido->chave->nome,
                'descricao' => $pedido->observacoes,
                'status' => Problema::STATUS_PENDENTE,
                'user_id' => $userId,
                'sala_id' => 1,
            ]);
        }

        $pedido->save();
        $chave->disponivel = true;
        $chave->save();
        session()->flash('mensagemDevolucao','Chave devolvida com sucesso!');
        return redirect()->route('admin_dashboard');
    }

    public function pedidosIndex(){
        return view('admin.pedidos.pedidos_admin',['pedidos' => Pedido::all()]);
    }

    public function pedidosUsuarioIndex(){
        return view('admin.pedidos.pedidos_usuario');
    }
    public function respondeUsuario(Request $request){
        $request->validate([
            'siape' => ['required','digits:7','numeric', new SiapeUsuario($request->siape)]
        ],[
            'siape.required' => 'Você precisa informar o SIAPE!',
            'siape.digits' => 'O siape é composto por 7 dígitos!',
            'siape.numeric' => 'O siape é composto apenas por números!'
        ]);
        $idusuario = User::where('siape',$request->siape)->first()->id;
        $pedidos = Pedido::where('user_id',$idusuario)->get();
        return view('admin.pedidos.relatorio_usuario',['pedidos' => $pedidos]);
    }
    public function pedidosPeriodoIndex(){
        return view('admin.pedidos.pedidos_periodo');
    }
    public function respondePeriodo(Request $request){
        $validacao = $request->validate([
            'data_inicio' => "required",
            'data_fim' => "required"
        ],[
            'data_inicio.required' => "Você precisa informar uma data de início!",
            'data_fim.required' => "Você precisa informar uma data de fim!"
        ]);

        $datainicio = $request->data_inicio;
        $datafim = $request->data_fim;

        $pedidos = Pedido::whereBetween('created_at',[$datainicio,$datafim])->get();
        return view('admin.pedidos.relatorio_periodo',['pedidos' => $pedidos]);
    }
    public function pedidosChaveIndex(){
        return view('admin.pedidos.pedidos_chave');
    }
    public function respondeChave(Request $request){

        $chave = Chave::where('nomelab',$request->chave)->get()->first();

        $validacao = $request->validate([
            'chave' => ['required',new ChaveExiste($chave)]
        ],[
            'chave.required' => 'Você precisa digitar a chave!'
        ]);
        $idchave = Chave::where('nomelab',$request->chave)->first()->id;
        $pedidos = Pedido::where('chave_id',$idchave)->get();
        return view('admin.pedidos.relatorio_chave',['pedidos' => $pedidos]);
    }
    public function loginEmprestimo(Request $request){

        $user = User::where('siape',$request->input('siape'))->first();

        $validacao = $request->validate([
            'siape' => ['bail','required','digits:7','numeric', new SiapeCorreto($user)],
            'senha' => ['required',new LoginCorreto($user)]
        ],[
            'siape.required' => 'Você precisa preencher o campo SIAPE!',
            'siape.digits' => 'O número do SIAPE precisa ter 7 dígitos!',
            'siape.numeric' => 'O SIAPE só pode ser composto por números!',
            'senha.required' => 'Você precisa prencher o campo de senha!'
        ]);

        $chaves = Chave::where('disponivel', true)->get();

        return view('admin.pedidos.emprestimo_dados',['user_siape' => $user->siape, 'chaves' => $chaves]);
    }
    public function pedidosUsuarioComum(Request $request){
        return view('usuario.pedidos_usuario',['pedidos' => Pedido::where('user_id',Auth::user()->id)->get()]);
    }
    public function buscarChavesPorCategoria(Request $request){

        $data = Chave::where('categoria' , $request->categoria)
            ->where('disponivel', true)
            ->get();

        return response()->json($data);
    }
    public function indexProblemas(){
        $pedido_com_problema = Pedido::whereNotIn('observacoes',['Nenhum','Indefinido'])->get();
        return view('admin.pedidos.index_problemas',['pedidos' => $pedido_com_problema]);
    }
    public function deleteProblema(Request $request,$problema_excluir){
        $pedido = Pedido::where('id',$problema_excluir)->get()->first();
        $pedido->observacoes = "Nenhum";
        $pedido->save();
        return redirect('indexProblemas');
    }

    public function reservasDoUsuario() {

        $pedidos = Pedido::where('user_id', Auth::id())
            ->with('chave')
            ->get();

        return view('tecnico.reservas', ['reservas' => $pedidos]);
    }
}

