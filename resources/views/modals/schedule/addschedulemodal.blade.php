<form action="{{ route('schedules.store') }}" method="post" id="add-form">
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
                            <label for="paciente_id">Paciente</label>
                            <select class="form-control select-filter" style="width: 100%" id="name_p_add" name="paciente_id" required>
                                <option value="" disabled selected hidden>Selecione o paciente</option>
                                @foreach ($patientnames as $patientname)
                                @if ($patientname['status'] !== 'INATIVO')
                                <option value="{{ $patientname->id }}">{{ $patientname->nome }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="usuario_id">Profissional</label>                            
                            <select class="form-control" name="usuario_id" id="usuario_id" required>
                                <option value="" disabled selected hidden>Selecione o profissional</option>
                                @foreach ($usernames as $username)
                                @if ($username['codigo_usuario'] !== 'M1' && $username['codigo_usuario'] !== 'S1')
                                <option value="{{ $username->id }}">{{ $username->nome }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="data_hora">Data e Hora</label>
                            <input type="datetime-local" class="form-control" id="data_hora" name="data_hora" 
                                value="@php echo str_replace(" ", "T", date("Y-m-d H:i", strtotime('-3 hours'))) @endphp" min="2018-06-07T70:00" max="2026-10-10T18:00" required>
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