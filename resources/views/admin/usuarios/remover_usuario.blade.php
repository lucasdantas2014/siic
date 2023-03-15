<form action="{{ route('admin_usuarios_remover', $user->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('POST')
        <h5 class="text-center">Você tem certeza que deseja remover remover {{ $user->nome }} ?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger">Sim, remover usuário</button>
    </div>
</form>
