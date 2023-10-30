<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="col d-flex flex-column align-items-center">

        <h3 class = 'px-5 py-3'>Salas Reservadas</h3>

        <div class="div-filtros row">

            <div class="input-group col-4">
                <label for="categoria">Categoria: </label>
                <select name="categoria" id ="categoria" wire:model="categoria" class = "form-control">
                    <option selected value = "">Todas as Categorias</option>

                    @foreach (App\Models\Sala::CATEGORIAS as $categoria)
                        <option value="{{ $categoria }}"> {{ $categoria }} </option>
                    @endforeach
                </select>
            </div>

            <div>
                <h3>Dados para devolução</h3>
                <form>
                    <input type="hidden" value = {{ $idChave }} name="idChave">
                </form>
            </div>

            <div class="input-group col-4">
                <label for="nome-sala">Sala: </label>
                <input id="nome-sala" class="form-control" type="text" name="nome-sala" wire:model="nomeSala" placeholder="Buscar pelo nome da sala...">
            </div>

            <div class="input-group col-4">
                <label for="nome-pessoa">Nome: </label>
                <input id="nome-pessoa" class="form-control" type="text" name="nome-pessoa" wire:model="nomePessoa" placeholder="Buscar pelo nome da pessoa...">
            </div>
        </div>

        <div class="container pt-4">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Sala</th>
                    <th scope ="col">Nome</th>
                    <th scope="col">Chave</th>
                    <th scope="col">Hora da reserva</th>
                    <td>
                        Ações
                    </td>
                </tr>
                </thead>
                <tbody>
                @foreach($pedidos as $pedido)
                    <tr>
                        <th>{{$pedido->chave->sala->nome}}</td>
                        <td>{{$pedido->user->nome}}</td>
                        <td>{{$pedido->chave->nome}}</td>
                        <td>{{\Carbon\Carbon::parse($pedido->created_at)->format('d/m/Y H:i:s')}}</td>
                        <td>
                            <button class="btn btn-danger">Devolver</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Trigger/Open the Modal -->
    <button onclick="document.getElementById('id01').style.display='block'"
            class="w3-btn">Open Modal</button>

    <!-- The Modal -->
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content">
            <div class="w3-container">
      <span wire:click="fecharModal">
            class="w3-closebtn">&times;</span>
                <p>Some text in the Modal..</p>
                <p>Some text in the Modal..</p>
            </div>
        </div>
    </div>
</div>
