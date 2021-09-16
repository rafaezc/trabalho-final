@extends('app')

@section('title', 'Usuários')

@section('content')
    <div class="container">
        <div class="row ml-auto mb-5">
            <div class="col-md-12" id="button-box"> <!-- definir tamanho das colunas -->
                <button type="button" class="btn btn-primary btn-right ml-2 mb-1"
                    data-toggle="modal" data-target="#deleteUserModal" id="user-delete">
                    Deletar
                </button>
                <button type="button" class="btn btn-primary btn-right ml-2 mb-1"
                    data-toggle="modal" data-target="#editUserModal" id="user-edit">
                    Editar
                </button>
                <button type="button" class="btn btn-primary btn-right ml-2 mb-1"  
                    data-toggle="modal" data-target="#addUserModal"> <!-- alterar cor/forma dos botoes -->
                    Adicionar
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
                            <td class="prettifier-table" scope="row" name="name" class="name">{{ $user['nome'] }}</td>
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
            @include('modals.addusermodal', ['modal_id' => 'addUserModal', 'modal_title' => 'Adicionar usuário'])
            @include('modals.editusermodal', ['modal_id' => 'editUserModal', 'modal_title' => 'Editar usuário'])
            @include('modals.deleteusermodal', ['modal_id' => 'deleteUserModal', 'modal_title' => 'Excluir usuário'])
    </div>
@endsection