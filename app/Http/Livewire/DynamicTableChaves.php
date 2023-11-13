<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chave;
use App\Models\Sala;
use Livewire\WithPagination;

class DynamicTableChaves extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $chaves = [];

    public $categoria;
    public $chave;
    public $mensagem;
    public $salas;

    public $itensPorPagina = 8;


    public function render()
    {
        $this->salas = Sala::all();
        if(!empty($this->categoria)) {
            $this->chaves = Chave::whereRelation('sala', 'categoria', $this->categoria)
                ->paginate($this->itensPorPagina);
            $this->mensagem = '';

            if (count($this->chaves) == 0) {
                $this->mensagem = 'Não há nenhuma chave dessa categoria disponível.';
            }
        } else {
            $this->chaves = Chave::paginate($this->itensPorPagina);
        }

        return view('livewire.dynamic-table-chaves', ['chaves' => $this->chaves])
            ->withCategorias(Sala::CATEGORIAS);;
    }
}
