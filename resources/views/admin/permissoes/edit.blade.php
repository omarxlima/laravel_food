@extends('adminlte::page')

@section('title', 'Editar Permissao')

@section('content_header')
    <h1>Editar Permissão</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('permissoes.index') }}">Permissões</a></li>
            <li class="breadcrumb-item active" aria-current="{{ route('permissoes.edit', $permissao->id) }}">{{ $permissao->nome }}</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="card" style="width: 50%">


        <div class="card-body" >
            <form action=" {{ route('permissoes.update', $permissao->id) }} " method="POST">
                @csrf
                @method('PUT')

               @include('admin.permissoes._partials.form')

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Editar</button>
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
