@extends('app')

@section('title', 'Agenda')

@extends('header')

@section('content')
    <div class="container mb-5">
        <h1>Agenda</h1>
    </div>
    <div class="container">
        <div class="row ml-auto mb-5">
            <div class="col-md-12" id="button-box"> <!-- definir tamanho das colunas -->
                <button type="button" class="btn btn-primary btn-right ml-2 mb-1"
                    data-toggle="modal" data-target="#deleteScheduleModal" id="schedule-delete">
                    <i class="fas fa-trash-alt"></i>&nbsp;Deletar
                </button>
                <button type="button" class="btn btn-primary btn-right ml-2 mb-1"
                    data-toggle="modal" data-target="#editScheduleModal" id="schedule-edit">
                    <i class="fas fa-edit"></i>&nbsp;Atender/Remarcar
                </button>
                <button type="button" class="btn btn-primary btn-right ml-2 mb-1"  
                    data-toggle="modal" data-target="#addScheduleModal" id="schedule-add"> 
                    <i class="fas fa-plus"></i>&nbsp;Adicionar
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table effect3d" id="schedule-data">
                    <thead>
                        <tr>
                            <th class="tablehead" scope="col">Paciente</th>
                            <th class="tablehead" scope="col">Profissional</th>
                            <th class="tablehead" scope="col">Data e Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedules as $schedule)
                        <tr>
                            <!-- terminar perfil do paciente(modais dos testes e configurar relatorio, add botao), 
                            validação front(resultado testes) -->
                            <td hidden name="id" class="id">{{ $schedule['id'] }}</td>
                            @foreach ($patientnames as $patientname) 
                                @if ($schedule['paciente_id'] == $patientname['id'])
                                    @php $schedule['paciente_nome'] = $patientname['nome'] @endphp
                                @endif 
                            @endforeach
                            <td class="prettifier-table">{{ $schedule['paciente_nome'] }}</td>
                            @foreach ($usernames as $username) 
                                @if ($schedule['usuario_id'] == $username['id']) 
                                    @php $schedule['usuario_nome'] = $username['nome'] @endphp
                                @endif 
                            @endforeach
                            <td class="prettifier-table">{{ $schedule['usuario_nome'] }}</td>
                            <td class="prettifier-table">{{ implode('/', array_reverse(explode('-', substr($schedule['data_hora'], 0, -9)))) }} {{ explode(' ', substr($schedule['data_hora'], 0, -3))[1] }}</td>
                            <td hidden name="anotacoes" class="anotacoes">{{ $schedule['anotacoes'] }}</td>
                            <td hidden name="conclusoes" class="conclusoes">{{ $schedule['conclusoes'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modals -->
            @include('modals.schedule.addschedulemodal', ['modal_id' => 'addScheduleModal', 'modal_title' => 'Adicionar sessão'])
            @include('modals.schedule.editschedulemodal', ['modal_id' => 'editScheduleModal', 'modal_title' => 'Editar sessão'])
            @include('modals.schedule.deleteschedulemodal', ['modal_id' => 'deleteScheduleModal', 'modal_title' => 'Excluir sessão'])
        {{ $schedules->links() }}
    </div>
@endsection
