<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sala;

class DynamicTableSalas extends Component
{

    public $categoria;
    public $salas=[];
    public $sala;
    public $mensagem;
    public $nomeSala='';

    public function render()
    {

        if(!empty($this->categoria)) {
            $this->salas = Sala::where('categoria', $this->categoria)
                ->where('nome', 'LIKE', '%' . $this->nomeSala . '%')
                ->get();
            $this->mensagem = '';

            if (count($this->salas) == 0) {
                $this->mensagem = 'Não há nenhuma chave dessa categoria disponível.';
            }
        } else {
            $this->salas = Sala::where('nome', 'LIKE', '%' . $this->nomeSala . '%')
                ->get();
            ;
        }

        return view('livewire.dynamic-table-salas')
            ->withCategorias(Sala::CATEGORIAS);;
    }
}
