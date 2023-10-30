<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DynamicTableDevolucoes extends Component
{
    public $abrirModal;
    public $fecharModal;

    public function render()
    {
        return view('livewire.dynamic-table-devolucoes');
    }
}
