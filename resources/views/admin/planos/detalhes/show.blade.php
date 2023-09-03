@extends('adminlte::page')

@section('title', 'Detalhes do Detalhe')

@section('content_header')
    <h1>Detalhes do Detalhe  <strong> {{$detalhe->nome}} </strong></h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('detalhes.index', [$plano->url, $detalhe->id])}}">Planos</a></li>
            <li class="breadcrumb-item active" aria-current="{{ route('detalhes.show', [$plano->url, $detalhe->id]) }}">{{ $detalhe->nome }}</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="card">


        <div class="card-body" >
            <ul>
                <li>
                    <strong>Nome: </strong> {{$detalhe->nome}}
                </li>

            </div>
        </div>
        <div class="card-footer">
            <form action="{{ route('detalhes.destroy', [$plano->url, $detalhe->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                    <button class="btn btn-danger">Deletar o Detalhe {{ $detalhe->nome }} do Plano {{ $plano->nome }}</button>
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
