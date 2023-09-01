@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>
        Planos

        <a class="btn btn-dark" href="{{route('planos.create')}}">Adicionar Plano</a>

    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
                #filtros
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($planos as $plano)
                            <tr>
                                <td>{{ $plano->nome}}</td>
                                <td>R$ {{ number_format($plano->preco, 2, ',','.')}}</td>
                                <td style="width: 10px"><a class="btn btn-warning" href="{{route('planos.show', $plano->url)}}">exibir</a></td>
                            </tr>

                    @empty
                        <p>Nenhum plano cadastrado!</p>
                    @endforelse

                </tbody>
              </table>
        </div>
        <div class="card-footer">
            {!! $planos->links() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
