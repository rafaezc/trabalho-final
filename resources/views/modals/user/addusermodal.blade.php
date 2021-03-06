<form action="{{ route('users.store') }}" method="post" id="add-form">
    <div class="modal fade" id="{{ $modal_id }}" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">{{ $modal_title }}</h5>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>
                @csrf
                <div class="modal-body">
                    <div class="container">
                        <div class="form-group">
                            <label for="name">Nome completo</label>
                            <input type="text" class="form-control" id="name" name="nome" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="user-type">Tipo de usuário</label>
                                <select class="form-control" id="user-type" name="codigo_usuario" onchange="changeFieldOne()" required>
                                    <option value="" disabled selected hidden>Selecione o cargo</option>
                                    <option value="P1">Psquiatra</option>
                                    <option value="P2">Psicólogo(a)</option>
                                    <option value="S1">Secretário(a)</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="council-type">Tipo de conselho</label>
                                <select class="form-control" id="council-type" name="tipo_conselho" onchange="changeFieldTwo()" required>
                                    <option value="-1" disabled selected hidden>Selecione o conselho</option>
                                    <option value="CRM">CRM</option>
                                    <option value="CRP">CRP</option>
                                    <option value="">Não possui</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="council-number">Número do conselho</label>
                                <input type="text" class="form-control" id="council-number" name="numero_conselho" placeholder="Ex: 12345/SP">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" id="password" name="senha" minlength="8" maxlength="40" placeholder="Crie uma senha com 8 caracteres no mínimo" required>
                        </div>
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