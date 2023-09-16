@extends('adminlte::page')

@section('title', "Adicionar novo detalhe ao plano {$plano->nome}")

@section('content_header')
    <h1>Adicionar novo detalhe ao Plano {{ $plano->nome}}</h1>
@stop

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('planos.index') }}" class="active">Planos</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('planos.show', $plano->url) }}"  class="active">{{ $plano->nome }}</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('detalhes.index', $plano->url) }}" >Detalhes</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('detalhes.create', $plano->url) }}"  class="active">Novo</a></li>
</ol>
    <div class="card" style="width: 50%">


        <div class="card-body" >
            <form action=" {{route('detalhes.store', $plano->url)}} " method="POST">


                @include('admin.planos.detalhes._partials.form')

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Cadastrar</button>
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
