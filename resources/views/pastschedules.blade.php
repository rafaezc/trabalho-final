@extends('app')

@section('title', 'Agenda')

@extends('header')

@section('content')
    <div class="container mb-5">
        <h1>Sessões Passadas</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table effect3d" id="pastschedule-data">
                    <thead>
                        <tr>
                            <th class="tablehead" scope="col">Paciente</th>
                            <th class="tablehead" scope="col">Profissional</th>
                            <th class="tablehead" scope="col">Data e Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedulesOlds as $scheduleOld)
                        <tr>
                            <td hidden name="id" class="id">{{ $scheduleOld['id'] }}</td>
                            @foreach ($patientnamesOlds as $patientnameOld) 
                                @if ($scheduleOld['paciente_id'] == $patientnameOld['id'])
                                    @php $scheduleOld['paciente_nome'] = $patientnameOld['nome'] @endphp
                                @endif 
                            @endforeach
                            <td class="prettifier-table">{{ $scheduleOld['paciente_nome'] }}</td>
                            @foreach ($usernamesOlds as $usernameOld) 
                                @if ($scheduleOld['usuario_id'] == $usernameOld['id']) 
                                    @php $scheduleOld['usuario_nome'] = $usernameOld['nome'] @endphp
                                @endif 
                            @endforeach
                            <td class="prettifier-table">{{ $scheduleOld['usuario_nome'] }}</td>
                            <td class="prettifier-table">{{ implode('/', array_reverse(explode('-', substr($scheduleOld['data_hora'], 0, -9)))) }} {{ explode(' ', substr($scheduleOld['data_hora'], 0, -3))[1] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $schedulesOlds->links() }}
    </div>
@endsection
