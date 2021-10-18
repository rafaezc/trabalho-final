@extends('app')

@section('title', 'Paciente '. $patientName = isset($patient['nome']) ? $patient['nome'] : '')

@extends('header')

@section('content')
    <div class="container mb-5">
        <div class="row mx-5">
            <div class="col-md-12">
                <h1>{{ $patientName }}</h1>
            </div>
        </div>
    </div>
    <div class="container"> 
        <div class="row mx-5">
            <div class="col-md-12">
                <div id="accordion">
                    <div class="card mb-4">
                        <h5 class="mb-0">
                            <button class="btn btn-link color-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Perfil 
                            </button>
                            <button type="button" class="btn btn-primary btn-right ml-2 mb-1"
                                data-toggle="modal" data-target="#deletePatientModal" id="patient-delete">
                                <i class="fas fa-trash-alt"></i>&nbsp;Deletar
                            </button>
                            <button type="button" class="btn btn-primary btn-right ml-2 mb-1"
                                data-toggle="modal" data-target="#editPatientModal" id="patient-edit">
                                <i class="fas fa-edit"></i>&nbsp;Editar
                            </button>
                        </h5>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label for="name">Nome completo</label>
                                                <input type="text" class="form-control" id="name" name="nome" value="@php echo $patientName = isset($patient['nome']) ? $patient['nome'] : '' @endphp" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="data_nascimento">Data de Nascimento</label>
                                                <input type="text" class="form-control" id="data_nascimento" name="data_nascimento" value="@php echo $patientDataNasc = isset($patient['data_nascimento']) ? $patient['data_nascimento'] : '' @endphp" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="cpf">CPF</label>
                                                <input type="text" class="form-control" id="cpf" name="cpf" value="@php echo $patientCpf = isset($patient['cpf']) ? $patient['cpf'] : '' @endphp" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="telefone">Telefone</label>
                                                <input type="text" class="form-control" id="telefone" name="telefone" value="@php echo $patientTel = isset($patient['telefone']) ? $patient['telefone'] : '' @endphp" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="escolaridade">Escolaridade</label>
                                                <input type="text" class="form-control" id="escolaridade" name="escolaridade" value="@php echo $patientEscol = isset($patient['escolaridade']) ? $patient['escolaridade'] : '' @endphp" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cadastrado_em">Data do cadastro</label>
                                                <input type="text" class="form-control" id="cadastrado_em" name="cadastrado_em" value="@php $patientDataCad = isset($patient['cadastrado_em']) ? $patient['cadastrado_em'] : '' @endphp @php echo implode('/', array_reverse(explode('-', substr($patientDataCad, 0, -9)))) @endphp" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label for="endereco">Endereço</label>
                                                <input type="text" class="form-control" id="endereco" name="endereco" value="@php echo $patientEnd = isset($patient['endereco']) ? $patient['endereco'] : '' @endphp" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="observacoes">Observações</label>
                                        <textarea type="text" class="form-control" id="observacoes" name="observacoes" rows="5" readonly>@php echo $patientObs = isset($patient['observacoes']) ? $patient['observacoes'] : '' @endphp</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($patientSchedules as $patientSchedule)
                    <div class="card mb-4">
                        <h5 class="mb-0">
                            <button class="btn btn-link color-link" data-toggle="collapse" data-target="@php echo "#collapse".$patientSchedule->id @endphp" aria-expanded="false" aria-controls="@php echo "collapse".$patientSchedule->id @endphp">
                                {{ " Sessão: " . implode('/', array_reverse(explode('-', substr($patientSchedule['data_hora'], 0, -9)))) }}
                            </button>
                            <button type="button" class="btn btn-primary btn-right ml-2 mb-1"  
                                data-toggle="modal" data-target="#addTestResultModal" id="testresult-add"> 
                                <i class="fas fa-plus"></i>&nbsp;Adicionar Teste
                            </button>
                        </h5>
                        <div id="@php echo "collapse".$patientSchedule->id @endphp" class="collapse" aria-labelledby="@php echo "heading".$patientSchedule->id @endphp" data-parent="#accordion">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Profissional</label>
                                                @foreach ($userProfNames as $userProfName) 
                                                @if ($patientSchedule['usuario_id'] == $userProfName['id']) 
                                                    @php $patientSchedule['usuario_nome'] = $userProfName['nome'] @endphp
                                                @endif 
                                                @endforeach
                                                <input type="text" class="form-control" id="name" name="nome" value="@php echo $patientProName = isset($patientSchedule['usuario_nome']) ? $patientSchedule['usuario_nome'] : '' @endphp" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="anotacoes">Anotações</label>
                                        <textarea type="text" class="form-control" id="anotacoes" name="anotacoes" rows="3" readonly>@php echo $patientAnot = isset($patientSchedule['anotacoes']) ? $patientSchedule['anotacoes'] : '' @endphp</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="conclusoes">Conclusão</label>
                                        <textarea type="text" class="form-control" id="conclusoes" name="conclusoes" rows="3" readonly>@php echo $patientConc = isset($patientSchedule['conclusoes']) ? $patientSchedule['conclusoes'] : '' @endphp</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- @dd($patientScheduleTests) --}}
                        @foreach ($testResults as $testResult)
                        @if ($testResult->sessao_id == $patientSchedule->id)
                        @foreach ($patientScheduleTests as $patientScheduleTest) 
                        @if ($testResult->teste_id == $patientScheduleTest->id)  
                            @php $testResult['nome_teste'] = $patientScheduleTest['nome'] @endphp
                        @endif
                        @endforeach
                        {{-- @if ($patientScheduleTest['id'] == $testResult->teste_id && $patientSchedule['id'] == $testResult->teste_id)  --}}
                        <div class="card mb-4">
                            <h5 class="mb-0">
                                <button class="btn btn-link color-link" data-toggle="collapse" data-target="@php echo "#collapse".$patientSchedule->id.$testResult->teste_id @endphp" aria-expanded="false" aria-controls="@php echo "collapse".$patientSchedule->id.$testResult->teste_id @endphp">
                                    {{ $testResult['nome_teste'] }}
                                </button>
                                <button type="button" class="btn btn-primary btn-right ml-2 mb-1"  
                                    data-toggle="modal" data-target="#deleteTestResultModal" id="testresult-delete"> 
                                    <i class="fas fa-trash-alt"></i>&nbsp;Deletar Teste
                                </button>
                                <button type="button" class="btn btn-primary btn-right ml-2 mb-1"  
                                    data-toggle="modal" data-target="#editTestResultModal" id="testresult-edit"> 
                                    <i class="fas fa-edit"></i></i>&nbsp;Editar Teste
                                </button>
                            </h5>
                            <div id="@php echo "collapse".$patientSchedule->id.$testResult->teste_id @endphp" class="collapse" aria-labelledby="@php echo "heading".$patientSchedule->id.$testResult->teste_id @endphp" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="test-name">Teste</label>
                                                    <input type="text" class="form-control" id="teste-name" name="teste-nome" value="@php echo $patientName = isset($patient['nome']) ? $patient['nome'] : '' @endphp" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="percentil">Percentil</label>
                                                    <input type="text" class="form-control" id="percentil" name="percentil" value="@php echo $patientDataNasc = isset($patient['data_nascimento']) ? $patient['data_nascimento'] : '' @endphp" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="comentario">Comentario</label>
                                            <textarea type="text" class="form-control" id="comentario" name="comentario" rows="3" readonly>@php echo $patientConc = isset($patientSchedule['conclusoes']) ? $patientSchedule['conclusoes'] : '' @endphp</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Modals -->
            @include('modals.patient.editpatientmodal', ['modal_id' => 'editPatientModal', 'modal_title' => 'Editar paciente'])
            @include('modals.patient.deletepatientmodal', ['modal_id' => 'deletePatientModal', 'modal_title' => 'Excluir paciente'])
            @include('modals.testResult.addtestresultmodal', ['modal_id' => 'addTestResultModal', 'modal_title' => 'Adicionar avaliação'])
            @include('modals.testResult.edittestresultmodal', ['modal_id' => 'editTestResultModal', 'modal_title' => 'Editar avaliação'])
            @include('modals.testResult.deletetestresultmodal', ['modal_id' => 'deleteTestResultModal', 'modal_title' => 'Excluir avaliação'])
    </div>
@endsection