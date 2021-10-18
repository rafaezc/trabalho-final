<form action="{{ route('patients.storetestorschedule', $patientSchedule->id) }}" method="post" id="add-form">
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
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="teste_id">Teste</label>
                                    <select class="form-control select-filter" style="width: 100%" id="test_s_add" name="teste_id" required>
                                        <option value="" disabled selected hidden>Selecione o teste</option>
                                        @foreach ($patientScheduleTests as $patientScheduleTest)
                                        <option value="{{ $patientScheduleTest->id }}">{{ $patientScheduleTest->nome }}</option>
                                        @endforeach
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
                            <label for="comentario">Comentário</label>
                            <textarea type="text" class="form-control" id="comentario" name="comentario" rows="5"></textarea>
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