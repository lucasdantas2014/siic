<?php

namespace App\Http\Livewire;

use App\Models\Chave;
use Livewire\Component;

class Dropdowns extends Component
{
    public $categoria;
    public $chaves=[];
    public $chave;
    public $mensagem;

    public function render()
    {
        if(!empty($this->categoria)) {
            $this->chaves = Chave::where('categoria', $this->categoria)
//                ->where('disponivel', true)
                ->get();
            $this->mensagem = '';

            if (count($this->chaves) == 0) {
                $this->mensagem = 'Não há nenhuma chave dessa categoria disponível.';
            }
        }
        return view('livewire.dropdowns')
            ->withCategorias(Chave::CATEGORIAS);
    }
}
