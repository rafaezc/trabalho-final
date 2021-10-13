@extends('app')

@section('title', 'Testes')

@section('content')
    <div class="container mb-5">
        <h1>Testes</h1>
    </div>
    <div class="container">
        <div class="row ml-auto mb-5">
            <div class="col-md-12" id="button-box"> <!-- definir tamanho das colunas -->
                <button type="button" class="btn btn-primary btn-right ml-2 mb-1"
                    data-toggle="modal" data-target="#deleteTestModal" id="test-delete">
                    <i class="fas fa-trash-alt"></i>&nbsp;Deletar
                </button>
                <button type="button" class="btn btn-primary btn-right ml-2 mb-1"
                    data-toggle="modal" data-target="#editTestModal" id="test-edit">
                    <i class="fas fa-edit"></i>&nbsp;Editar
                </button>
                <button type="button" class="btn btn-primary btn-right ml-2 mb-1"  
                    data-toggle="modal" data-target="#addTestModal" id="test-add"> 
                    <i class="fas fa-plus"></i>&nbsp;Adicionar
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table effect3d" id="test-data">
                    <thead>
                        <tr>
                            <th class="tablehead"scope="col">Nome</th>
                            <th class="tablehead" scope="col">Descrição</th>
                            <th class="tablehead" scope="col">Data do cadastro</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tests as $test)
                        <tr>
                            <td hidden name="id" class="id">{{ $test['id'] }}</td>
                            <td class="prettifier-table" scope="row" name="name" class="name">{{ $test['nome'] }}</td>
                            <td class="prettifier-table">{{ $test['descricao'] }}</td>
                            <td class="prettifier-table">{{ implode('/', array_reverse(explode('-', substr($test['cadastrado_em'], 0, -9)))) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modals -->
            @include('modals.test.addtestmodal', ['modal_id1' => 'addTestModal', 'modal_title1' => 'Adicionar teste'])
            @include('modals.test.edittestmodal', ['modal_id1' => 'editTestModal', 'modal_title1' => 'Editar teste'])
            @include('modals.test.deletetestmodal', ['modal_id1' => 'deleteTestModal', 'modal_title1' => 'Excluir teste'])
        {{ $tests->links() }}
    </div>
@endsection