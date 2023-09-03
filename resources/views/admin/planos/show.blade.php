@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
    <h1>Detalhes do Plano  <strong> {{$plano->nome}} </strong></h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('planos.index') }}">Planos</a></li>
            <li class="breadcrumb-item active" aria-current="{{ route('planos.show', $plano->url) }}">{{ $plano->nome }}</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="card" style="width: 50%">


        <div class="card-body" >
            <ul>
                <li>
                    <strong>Nome: </strong> {{$plano->nome}}
                </li>
                <li>
                    <strong>URL: </strong> {{$plano->url}}
                </li>
                <li>
                    <strong>Preço: </strong> {{ number_format($plano->preco, 2, ',','.') }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$plano->descricao}}
                </li>
            </ul>

            @include('admin.includes.alerts')


            <form action="{{ route('planos.destroy', $plano->url) }}" method="POST">
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
