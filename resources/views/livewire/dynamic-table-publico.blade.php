<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div>
        <h3 class ='px-5 py-3'>Salas Reservadas</h3>
        <div id="div-filtros" class="row">
            <div class="col-md-4">
                <label for="categoria">Categoria: </label>
                <select name="categoria" id ="categoria" wire:model="categoria" class = "form-control">
                    <option selected value = "">Todas as Categorias</option>

                    @foreach (App\Models\Sala::CATEGORIAS as $categoria)
                        <option value="{{ $categoria }}"> {{ $categoria }} </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <label for="nome-sala">Sala: </label>
                <input id="nome-sala" class="form-control" type="text" name="nome-sala" wire:model="nomeSala" placeholder="Buscar pelo nome da sala...">
            </div>

            <div class="col-md-4">
                <label for="nome-pessoa">Nome: </label>
                <input id="nome-pessoa" class="form-control" type="text" name="nome-pessoa" wire:model="nomePessoa" placeholder="Buscar pelo nome da pessoa...">
            </div>
        </div>

        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Sala</th>
                        <th scope ="col">Nome</th>
                        <th scope="col">Sala</th>
                        <th scope="col">Hora da reserva</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos as $pedido)
                        <tr>
                            <th>{{$pedido->chave->sala->nome}}</td>
                            <td>{{$pedido->user->nome}}</td>
                            <td>{{$pedido->chave->sala->nome}}</td>
                            <td>{{\Carbon\Carbon::parse($pedido->created_at)->format('d/m/Y H:i:s')}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div>
                {{ $pedidos->links() }}
            </div>
        </div>
    </div>

    <style>
        #div-filtros {
            padding: 10px;
        }
    </style>
</div>
