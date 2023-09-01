@extends('adminlte::page')

@section('title', 'Plano')

@section('content_header')
    <h1>Cadastrar Plano</h1>
@stop

@section('content')
    <div class="card" style="width: 50%">


        <div class="card-body" >
            <form action=" {{route('planos.store')}} " method="POST">
                @csrf
                
                @include('admin.planos._partials.form')

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
