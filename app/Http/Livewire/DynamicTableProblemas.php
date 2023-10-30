<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Problema;
use App\Models\Sala;

class DynamicTableProblemas extends Component
{
    public $categoria;
    public $problemas=[];
    public $problema;
    public $mensagem;

    public function render()
    {

        if(!empty($this->categoria)) {
            $this->problemas = Problema::whereRelation('sala', 'categoria', $this->categoria)
                ->get();
            $this->mensagem = '';

            if (count($this->problemas) == 0) {
                $this->mensagem = 'Não há nenhum problema dessa categoria disponível.';
            }
        } else {
            $this->problemas = Problema::all();
        }

        return view('livewire.dynamic-table-problemas')
            ->withCategorias(Sala::CATEGORIAS);;
    }
}
