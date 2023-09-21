@extends('adminlte::page')

@section('title', 'Detalhes da Permissão')

@section('content_header')
    <h1>Detalhes da Permissão  <strong> {{$permissao->nome}} </strong></h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('permissoes.index') }}">Permissões</a></li>
            <li class="breadcrumb-item active" aria-current="{{ route('permissoes.show', $permissao->id) }}">{{ $permissao->nome }}</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="card" style="width: 50%">


        <div class="card-body" >
            <ul>
                <li>
                    <strong>Nome: </strong> {{$permissao->nome}}
                </li>

                <li>
                    <strong>Descrição: </strong> {{$permissao->descricao}}
                </li>
            </ul>

            @include('admin.includes.alerts')


            <form action="{{ route('permissoes.destroy', $permissao->id) }}" method="POST">
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
