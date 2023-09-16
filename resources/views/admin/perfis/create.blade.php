@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
    <h1>Cadastrar Plano</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('perfis.index') }}">Perfis</a></li>
            <li class="breadcrumb-item active" aria-current="{{ route('perfis.create') }}">Novo</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="card" style="width: 50%">


        <div class="card-body">
            <form action=" {{ route('perfis.store') }} " method="POST">
                @csrf

                @include('admin.perfis._partials.form')

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
    <script>
        console.log('Hi!');
    </script>
@stop
