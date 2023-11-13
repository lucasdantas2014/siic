<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sala;
use Livewire\WithPagination;

class DynamicTableSalas extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $salas=[];

    public $categoria;
    public $sala;
    public $mensagem;
    public $nomeSala='';

    public function render()
    {

        if(!empty($this->categoria)) {
            $this->salas = Sala::where('categoria', $this->categoria)
                ->where('nome', 'LIKE', '%' . $this->nomeSala . '%')
                ->paginate(8);
            $this->mensagem = '';

            if (count($this->salas) == 0) {
                $this->mensagem = 'Não há nenhuma chave dessa categoria disponível.';
            }
        } else {
            $this->salas = Sala::where('nome', 'LIKE', '%' . $this->nomeSala . '%')
                ->paginate(8);
            ;
        }

        return view('livewire.dynamic-table-salas', ['salas' => $this->salas])
            ->withCategorias(Sala::CATEGORIAS);;
    }
}
