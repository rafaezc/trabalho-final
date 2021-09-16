<div class="modal fade" id="{{ $modal_id }}" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header modal-header">
                <h5 class="modal-title" id="addModalLabel">{{ $modal_title }}</h5>
                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                    x
                </button>
            </div>
            <form action="{{ route('users.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="container">
                        <div class="form-group">
                            <label for="name">Nome completo</label>
                            <input type="text" class="form-control" id="name" name="nome">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" id="email" name="email">
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
                                <input type="text" class="form-control" id="council-number" name="name">
                                <!-- criar tooltip com o tipo de informação esperada -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="text" class="form-control" id="password" name="senha">
                            <!-- criar tooltip com o tipo de informação esperada -->
                        </div>
                        <div class="form-group">
                            <label for="repeat-pass">Confirmar senha</label>
                            <input type="text" class="form-control" id="repeat-pass" name="senha">
                            <!-- criar tooltip com o tipo de informação esperada -->
                        </div>
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