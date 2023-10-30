<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Pedido;
use App\Models\Sala;

class DynamicTablePublico extends Component
{
    public $categoria;
    public $pedidos=[];
    public $pedido;
    public $mensagem;
    public $nomeSala='';
    public $nomePessoa='';

    public function render()
    {

        if(!empty($this->categoria)) {
            $this->pedidos = Pedido::where('created_at', '>=', Carbon::now()->subDay())
                ->whereRelation('chave.sala', 'categoria', $this->categoria)
                ->where('status', Pedido::STATUS_PENDENTE)
                ->with('user')
//                ->where('user.nome', 'LIKE', '%' . $this->nomePessoa . '%')
//                ->where('chave.sala.nome', 'LIKE', '%' . $this->nomeSala . '%')
                ->get();
            $this->mensagem = '';

            if (count($this->pedidos) == 0) {
                $this->mensagem = 'Não há nenhuma chave dessa categoria disponível.';
            }
        } else {

            $salas = Sala::where('nome', 'LIKE', '%' . $this->nomeSala . '%')
                ->select('id')
                ->get()
                ->toArray();

            $this->pedidos = Pedido::where('created_at', '>=', Carbon::now()->subDay())
                ->where('status', Pedido::STATUS_PENDENTE)
                ->with('user')
                ->whereHas('user', function ($query) {
                    $query->where('nome', 'LIKE', '%' . $this->nomePessoa . '%');
                })
                ->whereHas('chave', function ($query) {
                    $query->whereHas('sala', function ($query) {
                       $query->where('nome', 'LIKE', '%' . $this->nomeSala . '%');
                    });
                })
                ->get();
        }

        return view('livewire.dynamic-table-publico')
            ->withCategorias(Sala::CATEGORIAS);
    }
}
