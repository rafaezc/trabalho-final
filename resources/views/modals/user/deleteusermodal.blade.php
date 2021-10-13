<form action="{{ route('users.destroy') }}" method="post">
    <div class="modal fade" id="{{ $modal_id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">{{ $modal_title }}</h5>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="container">
                        <div class="delete-warning">
                            <div id="delete-username-warning"></div>    
                            {{-- Confirma a exlusão do usuário ? --}}
                            <div>Essa ação é irreversível e não poderá ser desfeita.</div>        
                        </div>
                        <input name="iddel" id="iddel" type="hidden" value="" >
                    </div>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-modal" data-dismiss="modal"><i class="fas fa-times"></i> FECHAR</button>
                    <button type="submit" class="btn btn-success btn-modal"><i class="fas fa-check"></i> EXCLUIR</button>
                </div>
            </div>
        </div>
    </div>
</form>