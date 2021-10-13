@extends('app')

@section('title', 'Pacientes')

@section('content')
    <div class="container mb-5">
        <h1>Busca Pacientes</h1>
    </div>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12" id="button-box"> 
                <form action="{{ route('patients.search') }}" method="post" id="filter-form">
                    @csrf
                    <div class="input-group">
                            <input class="form-control" type="text" id="search" name="search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> PESQUISAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table effect3d" id="patient-data">
                    <thead>
                        @if ($patients !== '')
                        <tr>
                            <th class="tablehead"scope="col">Nome</th>
                            <th class="tablehead" scope="col">CPF</th>
                            <th class="tablehead" scope="col">Endereço</th>
                            <th class="tablehead" scope="col">Telefone</th>
                            <th class="tablehead" scope="col">Data do cadastro</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                        @if ($patient['status'] !== 'INATIVO')
                        <tr>
                            <td hidden name="id" class="id">{{ $patient['id'] }}</td>
                            <td class="prettifier-table" scope="row" name="name" class="name">{{ $patient['nome'] }}</td>
                            <td class="prettifier-table">{{ $patient['cpf'] }}</td>
                            <td class="prettifier-table">{{ $patient['endereco'] }}</td>
                            <td class="prettifier-table">{{ $patient['telefone'] }}</td>
                            <td class="prettifier-table">{{ implode('/', array_reverse(explode('-', substr($patient['cadastrado_em'], 0, -9)))) }}</td>
                        </tr>
                        @endif
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        @if ($patients !== '')
        <a class="btn btn-primary btn-right btn-float" id="open-btn" href=""><i class="fas fa-window-maximize"></i>&nbsp;ABRIR</a> 
        @endif
        @if (isset($filter)) 
        {{ $patients->appends($filter)->links() }}
        @endif
    </div>
@endsection
