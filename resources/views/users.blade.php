@extends('app')

@section('title', 'Usuários')

@extends('header')

@section('content')
    <div class="container mb-5">
        <h1>Usuários</h1>
    </div>
    <div class="container">
        <div class="row ml-auto mb-5">
            <div class="col-md-12" id="button-box"> <!-- definir tamanho das colunas -->
                <button type="button" class="btn btn-primary btn-right ml-2 mb-1"
                    data-toggle="modal" data-target="#deleteUserModal" id="user-delete">
                    <i class="fas fa-trash-alt"></i>&nbsp;Deletar
                </button>
                <button type="button" class="btn btn-primary btn-right ml-2 mb-1"
                    data-toggle="modal" data-target="#editUserModal" id="user-edit">
                    <i class="fas fa-edit"></i>&nbsp;Editar
                </button>
                <button type="button" class="btn btn-primary btn-right ml-2 mb-1"  
                    data-toggle="modal" data-target="#addUserModal" id="user-add"> 
                    <i class="fas fa-plus"></i>&nbsp;Adicionar
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table effect3d" id="user-data">
                    <thead>
                        <tr>
                            <th class="tablehead"scope="col">Nome</th>
                            <th class="tablehead" scope="col">E-mail</th>
                            <th class="tablehead" scope="col">Cargo</th>
                            <th class="tablehead" scope="col">Conselho</th>
                            <th class="tablehead" scope="col">Data do cadastro</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        @if ($user['codigo_usuario'] !== 'M1')
                        <tr>
                            <td hidden name="id" class="id">{{ $user['id'] }}</td>
                            <td class="prettifier-table">{{ $user['nome'] }}</td>
                            <td class="prettifier-table">{{ $user['email'] }}</td>
                                @if ($user['codigo_usuario'] === 'P1') 
                                    @php $user['cargo'] = 'Psiquiatra'; @endphp
                                @elseif ($user['codigo_usuario'] === 'P2') 
                                    @php $user['cargo'] = 'Psicólogo(a)'; @endphp  
                                @else 
                                    @php $user['cargo'] = 'Secretário(a)'; @endphp 
                                @endif
                            <td class="prettifier-table">{{ $user['cargo'] }}</td>
                            <td class="prettifier-table">{{ $user['tipo_conselho'] }} {{ $user['numero_conselho'] }}</td>
                            <td class="prettifier-table">{{ implode('/', array_reverse(explode('-', substr($user['cadastrado_em'], 0, -9)))) }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modals -->
            @include('modals.user.addusermodal', ['modal_id' => 'addUserModal', 'modal_title' => 'Adicionar usuário'])
            @include('modals.user.editusermodal', ['modal_id' => 'editUserModal', 'modal_title' => 'Editar usuário'])
            @include('modals.user.deleteusermodal', ['modal_id' => 'deleteUserModal', 'modal_title' => 'Excluir usuário'])
    </div>
@endsection
