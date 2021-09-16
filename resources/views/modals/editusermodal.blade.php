<div class="modal fade" id="{{ $modal_id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modal-header">
                <h5 class="modal-title" id="editModalLabel">{{ $modal_title }}
                    <h5 class="modal-title" id="editModalUserName">
                    </h5>
                </h5>
                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                    x
                </button>
            </div>
            <form action="{{ route('users.update') }}" method="post" id="edit-form"> <!-- overflow dos modais -->
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="container">
                        <div class="form-group">
                            <label for="name">Nome completo</label>
                            <input type="text" class="form-control" id="name" name="nome" value="">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" id="email" name="email" value="">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="user-type">Tipo de usuário</label>
                                <select class="form-control" id="user-type" name="codigo_usuario">
                                    <option value="P1">Psquiatra</option>
                                    <option value="P2">Psicólogo(a)</option>
                                    <option value="S1">Secretário(a)</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="council-type">Tipo de conselho</label>
                                <select class="form-control" id="council-type" name="tipo_conselho">
                                    <option value="CRM">CRM</option>
                                    <option value="CRP">CRP</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="council-number">Número do conselho</label>
                                <input type="text" class="form-control" id="council-number" name="num_conselho" value="">
                                <!-- criar tooltip com o tipo de informação esperada -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Nova senha</label>
                            <input type="text" class="form-control" id="password" name="senha">
                            <!-- criar tooltip com o tipo de informação esperada -->
                        </div>
                        <div class="form-group">
                            <label for="repeat-pass">Confirmar nova senha</label>
                            <input type="text" class="form-control" id="repeat-pass" name="senha">
                            <!-- criar tooltip com o tipo de informação esperada -->
                        </div>
                        <input name="idup" id="idup" type="hidden" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-modal" data-dismiss="modal">FECHAR</button>
                    <button type="submit" class="btn btn-success btn-modal">SALVAR</button>
                </div>
            </form>
        </div>
    </div>
</div>