@extends('app')

@section('title', 'Usuários')

@section('content')
    <div class="container">
        <div class="row ml-auto mb-5">
            <div class="col"> <!-- definir tamanho das colunas -->
                <button type="button" class="btn btn-primary btn-right ml-2 mb-1"> <!-- alterar cor/forma dos botoes -->
                    Adicionar
                </button>
                <button type="button" class="btn btn-primary btn-right ml-2 mb-1">
                    Editar
                </button>
                <button type="button" class="btn btn-primary btn-right ml-2 mb-1">
                    Deletar
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="prettifier-table" scope="row">1</th>
                            <td class="prettifier-table">Mark</td>
                            <td class="prettifier-table">Otto</td>
                            <td class="prettifier-table">@mdo</td>
                        </tr>
                        <tr>
                            <td class="prettifier-table" scope="row">2</th>
                            <td class="prettifier-table">Jacob</td>
                            <td class="prettifier-table">Thornton</td>
                            <td class="prettifier-table">@fat</td>
                        </tr>
                        <tr>
                            <td class="prettifier-table" scope="row">3</th>
                            <td class="prettifier-table">Larry</td>
                            <td class="prettifier-table">the Bird</td>
                            <td class="prettifier-table">@twitter</td>
                        </tr>
                        <tr>
                            <td class="prettifier-table" scope="row">1</th>
                            <td class="prettifier-table">Mark</td>
                            <td class="prettifier-table">Otto</td>
                            <td class="prettifier-table">@mdo</td>
                        </tr>
                        <tr>
                            <td class="prettifier-table" scope="row">2</th>
                            <td class="prettifier-table">Jacob</td>
                            <td class="prettifier-table">Thornton</td>
                            <td class="prettifier-table">@fat</td>
                        </tr>
                        <tr>
                            <td class="prettifier-table" scope="row">3</th>
                            <td class="prettifier-table">Larry</td>
                            <td class="prettifier-table">the Bird</td>
                            <td class="prettifier-table">@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection