<form action="{{ route('testresults.store') }}" method="post" id="add-form">
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
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" maxlength="14" placeholder="XXX.XXX.XXX-XX" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="data_nascimento">Data de Nascimento</label>
                                    <input type="text" class="form-control" id="data_nascimento" name="data_nascimento" maxlength="10" placeholder="DD/MM/AAAA" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Ex: Av. das Palmeiras, 1289 - Guarulhos - SP" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone" maxlength="15" placeholder="Ex: (21) 99874-1021 ou (21) 3297-2120" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="escolaridade">Escolaridade</label>
                                <select class="form-control" id="escolaridade" name="escolaridade">
                                    <option value="" disabled selected hidden>Selecione o nível</option>
                                    <option value="Fundamental Incompleto">Fundamental Incompleto</option>
                                    <option value="Fundamental Completo">Fundamental Completo</option>
                                    <option value="Médio Incompleto">Médio Incompleto</option>
                                    <option value="Médio Completo">Médio Completo</option>
                                    <option value="Superior Incompleto">Superior Incompleto</option>
                                    <option value="Superior Completo">Superior Completo</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="observacoes">Observações</label>
                            <textarea type="text" class="form-control" id="observacoes" name="observacoes" rows="5"></textarea>
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