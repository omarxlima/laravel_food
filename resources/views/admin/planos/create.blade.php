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
                <div class="form-group">
                    <label for="">Nome:</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome">
                </div>
                <div class="form-group">
                    <label for="">Preço:</label>
                    <input type="text" name="preco" class="form-control" placeholder="Preço">
                </div>
                <div class="form-group">
                    <label for="">Descrição:</label>
                    <input type="text" name="descricao" class="form-control" placeholder="Descrição">
                </div>

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
