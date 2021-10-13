<form action="{{ route('tests.update') }}" method="post" id="edit-form"> 
    <div class="modal fade" id="{{ $modal_id1 }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">{{ $modal_title1 }}
                        <h5 class="modal-title" id="editModalTestName">
                        </h5>
                    </h5>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="container">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="nome" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea type="text" class="form-control" id="descricao" name="descricao" rows="5" placeholder="Insira aqui uma breve descrição da realização e objetivos do teste" required></textarea>
                        </div>
                        <input name="idup" id="idup" type="hidden" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-modal" data-dismiss="modal"><i class="fas fa-times"></i> FECHAR</button>
                    <button type="submit" class="btn btn-success btn-modal"><i class="fas fa-check"></i> SALVAR</button>
                </div>
            </div>
        </div>
    </div>
</form>