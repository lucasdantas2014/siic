<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Perfil;
use App\Rules\SenhaCorreta;
use Illuminate\Validation\Rule;
use Hash;
use Session;

class AuthController extends Controller
{
    // Retornar página de login
    public function loginPage()
    {
        return view('login.login');
    }

    // Controller do formulário de login
    public function login(Request $request)
    {
        $request->validate([
            'siape' => 'required|digits:7|numeric',
            'password' => 'required',
        ],[
            'siape.required' => 'Você precisa preencher o campo SIAPE!',
            'siape.digits' => 'O número do SIAPE precisa ter 7 dígitos!',
            'siape.numeric' => 'O SIAPE só pode ser composto por números!',
            'password.required' => 'Você precisa prencher o campo de senha!'
        ]);

        $credentials = $request->only('siape', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $request->session()->regenerate();

            if(Auth::user()->is_admin){
                return redirect(route('admin_dashboard'));
            }
            else{
                return redirect()->intended(route('tecnico_dashboard'));
            }
        }
        return redirect('login')->with('alert','Senha ou SIAPE inválido!');
    }

    // Retornar página de registro
     public function register_page()
    {
        return view('login.registration');
    }

    // Formulário de registro

     public function register(Request $request)
    {
        $validacao = $request->validate([
            'nome' => 'required',
            'siape' => 'required|numeric|digits:7',
            'password' => 'required',
            'email' => 'required',
            'telefonecelular' => 'required|numeric',
            'cargo' => ['required',Rule::notIn(['#'])]
        ],[
            'nome.required' => 'Você precisa digitar o nome do usuário! ',
            'siape.required' => 'Você precisa digitar o SIAPE do usuário',
            'siape.numeric' => 'O siape só possui números!',
            'siape.digits' => 'O siape só possui 7 dígitos!',
            'password.required' => 'Você precisa digitar a senha do usuário!',
            'email.required' => 'Você precisa digitar o email do usuário!',
            'telefonecelular.required' => 'Você precisa digitar o telefone celular do usuário!',
            'telefonecelular.numeric' => 'O telefone celular só é composto de números!',
            'cargo.required' => 'Você precisa escolher o cargo!',
            'cargo.not_in' => 'Você precisa escolher o cargo!'
        ]);
        $data = $request->all();
        $check = $this->create($data);
        session()->flash('mensagemRegistro','Conta cadastrada com sucesso!');
        return redirect()->route('dashboard');
    }


    public function create(array $data)
    {
      return User::create([
        'nome' => $data['nome'],
        'siape' => $data['siape'],
        'password' => Hash::make($data['password']),
        'email' => $data['email'],
        'telefonecelular' => $data['telefonecelular'],
        'cargo' => $data['cargo'],
        'setor' => $data['setor'],
        'perfil_id' => 2
      ]);
    }

    public function dashboard()
    {
        if(Auth::check()){
           if(Auth::user()->is_admin){
                return view('admin.dashboard',['user' =>Auth::user()]);
           }
           else {
               return view('tecnico.dashboard', ['user' => Auth::user()]);
           }
        //    else{
        //          return view('professor.dashboard',['user' =>Auth::user()]);
        //    }
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('painel'));
    }

    public function firstloginIndex(){
        // Lembra de configurar um middleware pra não deixar o usuário acessar esta página sem ter logado e estar com firstlogin ativado
        return view('login.firstlogin');
    }

    public function customFirstLogin(Request $request){
        Auth::user()->password = Hash::make($request->senhanova);
        Auth::user()->first_login = false;
        Auth::user()->save();
        return redirect('login');
    }

    public function trocarSenhaIndex(){
        return view('login.trocarsenha');
    }
    public function trocarSenhaStore(Request $request){
        $request->validate([
            'senhaantiga' => ['required',new SenhaCorreta($request->senhaantiga)],
            'senhanova' => ['required']
        ],[
            'senhaantiga.required' => 'Você precisa digitar a senha antiga!',
            'senhanova.required' => 'Você precisa digitar a nova senha!'
        ]);
        $user = Auth::user();
        $user->update([
            'password' => Hash::make($request->senhanova)
        ]);
        $user->save();
        session()->flash('mensagemTroca','Senha trocada com sucesso!');
        return redirect()->route('dashboard');
    }


}
