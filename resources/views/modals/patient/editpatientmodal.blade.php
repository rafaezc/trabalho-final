<form action="{{ route('patients.update', $patient->id) }}" method="post" id="edit-form"> 
    <div class="modal fade" id="{{ $modal_id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">{{ $modal_title }}
                        <h5 class="modal-title" id="editModalUserName">
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
                            <label for="name">Nome completo</label>
                            <input type="text" class="form-control" id="name" name="nome" value="@php echo $patient->nome @endphp" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" maxlength="14" placeholder="XXX.XXX.XXX-XX" value="@php echo $patient->cpf @endphp" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="data_nascimento">Data de Nascimento</label>
                                    <input type="text" class="form-control" id="data_nascimento" name="data_nascimento" maxlength="10" placeholder="DD/MM/AAAA" value="@php echo $patient->data_nascimento @endphp" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endere??o</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Ex: Av. das Palmeiras, 1289 - Guarulhos - SP" value="@php echo $patient->endereco @endphp" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone" maxlength="15" placeholder="Ex: (21) 99874-1021 ou (21) 3297-2120" value="@php echo $patient->telefone @endphp" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="escolaridade">Escolaridade</label>
                                <select class="form-control" id="escolaridade" name="escolaridade">
                                    <option value="" disabled selected hidden>Selecione o n??vel</option>
                                    <option value="Fundamental Incompleto" @php echo $selected = $patient->escolaridade == "Fundamental Incompleto" ? "selected" : "" @endphp>Fundamental Incompleto</option>
                                    <option value="Fundamental Completo" @php echo $selected = $patient->escolaridade == "Fundamental Completo" ? "selected" : "" @endphp>Fundamental Completo</option>
                                    <option value="M??dio Incompleto" @php echo $selected = $patient->escolaridade == "M??dio Incompleto" ? "selected" : "" @endphp>M??dio Incompleto</option>
                                    <option value="M??dio Completo" @php echo $selected = $patient->escolaridade == "M??dio Completo" ? "selected" : "" @endphp>M??dio Completo</option>
                                    <option value="Superior Incompleto" @php echo $selected = $patient->escolaridade == "Superior Incompleto" ? "selected" : "" @endphp>Superior Incompleto</option>
                                    <option value="Superior Completo" @php echo $selected = $patient->escolaridade == "Superior Completo" ? "selected" : "" @endphp>Superior Completo</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="observacoes">Observa????es</label>
                            <textarea type="text" class="form-control" id="observacoes" name="observacoes" rows="5">{{ $patient->observacoes }}</textarea>
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