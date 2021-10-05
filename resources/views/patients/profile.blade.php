@extends('app')

@section('title', 'Paciente '.$patient['nome'])

@section('content')
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Nome completo</label>
                                                <input type="text" class="form-control" id="name" name="nome" value="@php echo $patient['nome'] @endphp" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cpf">CPF</label>
                                                <input type="text" class="form-control" id="cpf" name="cpf" value="@php echo $patient['cpf'] @endphp" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cadastrado_em">Data do cadastro</label>
                                                <input type="text" class="form-control" id="cadastrado_em" name="cadastrado_em" value="@php echo implode('/', array_reverse(explode('-', substr($patient['cadastrado_em'], 0, -9)))) @endphp" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label for="endereco">Enderço</label>
                                                <input type="text" class="form-control" id="endereco" name="endereco" value="@php echo $patient['endereco'] @endphp" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="telefone">Telefone</label>
                                                <input type="text" class="form-control" id="telefone" name="telefone" value="@php echo $patient['telefone'] @endphp" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="observacoes">Observações</label>
                                        <textarea type="text" class="form-control" id="observacoes" name="observacoes" rows="5" readonly>@php echo $patient['observacoes'] @endphp</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <h5 class="mb-0">
                            <button class="btn btn-link color-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Histórico de sesões
                            </button>
                        </h5>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modals -->
            @include('modals.patient.editpatientmodal', ['modal_id' => 'editPatientModal', 'modal_title' => 'Editar paciente'])
            @include('modals.patient.deletepatientmodal', ['modal_id' => 'deletePatientModal', 'modal_title' => 'Excluir paciente'])
    </div>
@endsection