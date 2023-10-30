<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Usuario;
use Livewire\Component;

class DynamicTableUsuarios extends Component
{
    public $usuarios = [];
    public $nome;
    public $usuario;

    public function render()
    {
        if (!empty(!$this->nome)) {
            $this->usuarios = User::all();
        } else {
            $this->usuarios = User::where('name','LIKE', '%' . $this->nome . '%');
        }

        return view('livewire.dynamic-table-usuarios');
    }

    public function editarUsuario($id) {
        $this->usuario = User::find($id);
        $this->dispatchBrowserEvent('openEditarModal');

    }
}
