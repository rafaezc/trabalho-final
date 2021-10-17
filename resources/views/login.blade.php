@extends('app')

@section('title', 'SMARP')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 my-5">
                <div class="card shadow-lg border-0 my-5">
                    <div class="card-header">
                        <h3 class="text-center my-4">SMARP</h3>
                    </div>
                    <div class="card-body login-background-card">  
                        <form method="post" action="{{ route('login.playball') }}" id="logForm">
                        @csrf
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                        </div>
                        <div class="form-group">
                            <label for="button">&nbsp;</label>
                            <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> LOGIN</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

