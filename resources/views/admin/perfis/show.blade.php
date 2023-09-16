@extends('adminlte::page')

@section('title', 'Detalhes do perfil')

@section('content_header')
    <h1>Detalhes do perfil  <strong> {{$perfil->nome}} </strong></h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('perfis.index') }}">Perfis</a></li>
            <li class="breadcrumb-item active" aria-current="{{ route('perfis.show', $perfil->id) }}">{{ $perfil->nome }}</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="card" style="width: 50%">


        <div class="card-body" >
            <ul>
                <li>
                    <strong>Nome: </strong> {{$perfil->nome}}
                </li>

                <li>
                    <strong>Descrição: </strong> {{$perfil->descricao}}
                </li>
            </ul>

            @include('admin.includes.alerts')


            <form action="{{ route('perfis.destroy', $perfil->id) }}" method="POST">
                @csrf
                @method('DELETE')
                    <button class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
