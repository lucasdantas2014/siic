<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chave;
use App\Models\Sala;

class DynamicTableChaves extends Component
{
    public $categoria;
    public $chaves=[];
    public $chave;
    public $mensagem;
    public $salas;

    public function render()
    {
        $this->salas = Sala::all();
        if(!empty($this->categoria)) {
            $this->chaves = Chave::whereRelation('sala', 'categoria', $this->categoria)
                ->get();
            $this->mensagem = '';

            if (count($this->chaves) == 0) {
                $this->mensagem = 'Não há nenhuma chave dessa categoria disponível.';
            }
        } else {
            $this->chaves = Chave::all();
        }

        return view('livewire.dynamic-table-chaves')
            ->withCategorias(Sala::CATEGORIAS);;
    }
}
