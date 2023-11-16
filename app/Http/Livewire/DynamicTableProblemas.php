<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Problema;
use App\Models\Sala;

use Livewire\WithPagination;

class DynamicTableProblemas extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $problemas = [];

    public $categoria;
    public $problema;
    public $mensagem;

    public $itensPorPagina = 8;

    public function render()
    {

        if(!empty($this->categoria)) {
            $this->problemas = Problema::whereRelation('sala', 'categoria', $this->categoria)
                ->paginate($this->itensPorPagina);
            $this->mensagem = '';

            if (count($this->problemas) == 0) {
                $this->mensagem = 'Não há nenhum problema dessa categoria disponível.';
            }
        } else {
            $this->problemas = Problema::paginate($this->itensPorPagina);
        }

        return view('livewire.dynamic-table-problemas', [
            'problemas' => $this->problemas
        ])
            ->withCategorias(Sala::CATEGORIAS);;
    }
}
