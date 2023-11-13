<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Usuario;
use Livewire\Component;
use Livewire\WithPagination;

class DynamicTableUsuarios extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $usuarios = [];

    public $nome;
    public $usuario;

    public $itensPorPagina = 8;

    public function render()
    {
        if (!empty(!$this->nome)) {
            $this->usuarios = User::paginate($this->itensPorPagina);
        } else {
            $this->usuarios = User::where('name','LIKE', '%' . $this->nome . '%')
                ->paginate($this->itensPorPagina);
        }

        return view('livewire.dynamic-table-usuarios', ['usuarios' => $this->usuarios]);
    }

    public function editarUsuario($id) {
        $this->usuario = User::find($id);
        $this->dispatchBrowserEvent('openEditarModal');

    }
}
