@extends('adminlte::page')

@section('title', "Editar p detalhe do plano {$detalhe->nome}")

@section('content_header')
    <h1>Editar detalhe  {{ $detalhe->nome}}</h1>
@stop

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('planos.index') }}" class="active">Planos</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('planos.show', $plano->url) }}"  class="active">{{ $plano->nome }}</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('detalhes.index', $plano->url) }}" >Detalhes</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('detalhes.edit', [$plano->url, $detalhe->id]) }}"  class="active">Editar</a></li>
</ol>
    <div class="card" style="width: 50%">


        <div class="card-body" >
            <form action=" {{route('detalhes.update', [$plano->url, $detalhe->id])}} " method="POST">
                @method('PUT')

                @include('admin.planos.detalhes._partials.form')

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Atualizar</button>
                </div>


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
