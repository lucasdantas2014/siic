<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Pedido;
use App\Models\Sala;
use Livewire\WithPagination;

class DynamicTablePublico extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $pedidos=[];

    public $categoria;
    public $pedido;
    public $mensagem;
    public $nomeSala='';
    public $nomePessoa='';

    public $itensPorPagina = 8;

    public function render()
    {

        if(!empty($this->categoria)) {
            $this->pedidos = Pedido::whereRelation('chave.sala', 'categoria', $this->categoria)
                ->where('status', Pedido::STATUS_PENDENTE)
                ->with('user')
//                ->where('user.nome', 'LIKE', '%' . $this->nomePessoa . '%')
//                ->where('chave.sala.nome', 'LIKE', '%' . $this->nomeSala . '%')
                ->paginate($this->itensPorPagina);
            $this->mensagem = '';

            if (count($this->pedidos) == 0) {
                $this->mensagem = 'Não há nenhuma chave dessa categoria disponível.';
            }
        } else {

            $salas = Sala::where('nome', 'LIKE', '%' . $this->nomeSala . '%')
                ->select('id')
                ->get()
                ->toArray();

            $this->pedidos = Pedido::where('status', Pedido::STATUS_PENDENTE)
                ->with('user')
                ->whereHas('user', function ($query) {
                    $query->where('nome', 'LIKE', '%' . $this->nomePessoa . '%');
                })
                ->whereHas('chave', function ($query) {
                    $query->whereHas('sala', function ($query) {
                       $query->where('nome', 'LIKE', '%' . $this->nomeSala . '%');
                    });
                })
                ->paginate($this->itensPorPagina);
        }

        return view('livewire.dynamic-table-publico', ['pedidos' => $this->pedidos])
            ->withCategorias(Sala::CATEGORIAS);
    }
}
