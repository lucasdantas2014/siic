<?php

namespace App\Http\Livewire;

use App\Models\Chave;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class FormEmprestimo extends Component
{

    public String $siape;
    public String $senha;
    public $usuarioValido;

    public function render()
    {
        $chaves = Chave::where('disponivel', true)->get();

        return view('livewire.form-emprestimo', [
            'chaves' => $chaves
        ]);
    }

    public function validarUsuario()
    {

        $user = User::where('siape', $this->siape)->first(); // Substitua 'login' pelo nome da coluna da tabela de usuários que armazena os nomes de usuário

        if ($user && Hash::check($this->senha, $user->password)) {
            $this->usuarioValido = $user;
        } else {
            $this->usuarioValido = null;
        }
    }
}
