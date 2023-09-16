@extends('adminlte::page')

@section('title', 'Editar Plano')

@section('content_header')
    <h1>Editar Plano</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('perfis.index') }}">Perfis</a></li>
            <li class="breadcrumb-item active" aria-current="{{ route('perfis.edit', $perfil->id) }}">{{ $perfil->nome }}</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="card" style="width: 50%">


        <div class="card-body" >
            <form action=" {{ route('perfis.update', $perfil->id) }} " method="POST">
                @csrf
                @method('PUT')

               @include('admin.perfis._partials.form')

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
