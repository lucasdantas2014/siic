<div>
    <div class="mb-8">
        <label class="inline-block w-32 font-bold">Categoria:</label>
        <select name="categoria" wire:model="categoria" class="border shadow p-2 bg-white">
            <option value=''>Escolha uma categoria</option>
            @foreach($categorias as $categoria)
                <option value={{ $categoria}}>{{ $categoria }}</option>
            @endforeach
        </select>
    </div>
    @if(count($chaves) > 0)
        <div class="mb-8">
            <label class="inline-block w-32 font-bold">Chave:</label>
            <select name="chave" wire:model="chave"
                    class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                <option value=''>Escolha uma chave</option>
                @foreach($chaves as $chave)
                    <option value={{ $chave->id }}>{{ $chave->nome }}</option>
                @endforeach
            </select>
        </div>
    @endif

    <p>{{ $mensagem }}</p>
</div>
