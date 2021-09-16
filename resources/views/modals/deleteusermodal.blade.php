<div class="modal fade" id="{{ $modal_id }}" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel">{{ $modal_title }}</h5>
                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                    x
                </button>
            </div>
            <form action="{{ route('users.destroy') }}" method="post">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="container">
                        <div class="delete-warning">
                            Confirma a exlusão do usuário 
                            {{-- {{ $user_name }}?  --}}
                            Essa ação é irreversível e não poderá ser desfeita.
                            <input name="iddel" id="iddel" type="hidden" value="" >
                        </div>
                    </div>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-modal" data-dismiss="modal">FECHAR</button>
                    <button type="submit" class="btn btn-success btn-modal">EXCLUIR</button>
                </div>
            </form>
        </div>
    </div>
</div>