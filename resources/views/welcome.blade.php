@extends('app')

@section('title', 'Bem vindo(a)')

@extends('header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="container mb-5">
                <h1>{{ "Bem vindo(a), " . session()->get('user_name') . " !" }}</h1>
            </div>
        </div>
    </div>
@endsection