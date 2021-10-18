<form action="{{ route('schedules.update') }}" method="post" id="edit-form"> 
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
                            <label for="paciente_id">Paciente</label>
                            <select class="form-control select-filter" style="width: 100%" id="name_p_edit" name="paciente_id">
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
                            <select class="form-control" name="usuario_id" id="name_u">
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
                                value="" min="2021-06-07T70:00" max="2026-10-10T18:00">
                        </div>
                        <div class="form-group">
                            <label for="anotacoes">Anotações</label>
                            @php $disabled = session()->get('user_code') == 'S1' ? 'disabled' : '' @endphp
                            <textarea type="text" class="form-control" id="anotacoes" name="anotacoes" rows="5" @php echo $disabled @endphp>{{ $schedule['anotacoes'] }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="conclusoes">Conclusão</label>
                            @php $disabled = session()->get('user_code') == 'S1' ? 'disabled' : '' @endphp  
                            <textarea type="text" class="form-control" id="conclusoes" name="conclusoes" rows="5" @php echo $disabled @endphp>{{ $schedule['conclusoes'] }}</textarea>
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