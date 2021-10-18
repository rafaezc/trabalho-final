<form action="{{ route('patients.updatetestorschedule', $patientSchedule->id) }}" method="post" id="edit-form"> 
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
                                    <select class="form-control select-filter" style="width: 100%" id="test_s_edit" name="teste_id" required>
                                        <option value="" disabled selected hidden>Selecione o teste</option>
                                        @foreach ($patientScheduleTests as $patientScheduleTest)
                                        @foreach ($testResults as $testResult)
                                            @php $percentil = $testResult->percentil @endphp
                                            @php $comentario = $testResult->comentario @endphp
                                            @if ($patientScheduleTest->id == $testResult->teste_id)
                                                @php $selected = "selected" @endphp
                                            @else
                                                @php $selected = "" @endphp                                                        
                                            @endif
                                            @endforeach     
                                        <option value="{{ $patientScheduleTest->id }}"@php echo $selected @endphp>{{ $patientScheduleTest->nome }}</option>
                                        @endforeach 
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="percentil">Percentil</label>
                                    <input type="text" class="form-control" id="percentil" name="percentil" minlength="2" maxlength="3" value="@php echo $percentil @endphp" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="comentario">Comentário</label>
                            <textarea type="text" class="form-control" id="comentario" name="comentario" rows="5">{{ $comentario }}</textarea>
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