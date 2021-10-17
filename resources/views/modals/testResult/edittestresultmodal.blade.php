<form action="{{ route('testresults.update', $patientSchedule->id) }}" method="post" id="edit-form"> 
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
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="teste_id">Teste</label>
                                    <select class="form-control select-filter" style="width: 100%" name="teste_id" id="teste_add" required>
                                        <option value="" disabled selected hidden>Selecione o teste</option>
                                        {{-- @foreach ($patientScheduleTests as $patientScheduleTest) --}}
                                        {{-- <option value="{{ $patientScheduleTest->id }}">{{ $patientScheduleTest->nome }}</option> --}}
                                        {{-- @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="percentil">Percentil</label>
                                    <input type="text" class="form-control" id="percentil" name="percentil" minlength="2" maxlength="3" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="comentarios">Observações</label>
                            <textarea type="text" class="form-control" id="comentarios" name="comentarios" rows="5"></textarea>
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