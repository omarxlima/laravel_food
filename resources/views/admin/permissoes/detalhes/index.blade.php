@extends('adminlte::page')

@section('title', "Detalhe do plano {$plano->nome} ")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('planos.index') }}" >Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('planos.show', $plano->url) }}"> {{ $plano->nome }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('detalhes.index', $plano->url) }}">Detalhes</a></li>
        {{-- <li class="breadcrumb-item active"><a href="{{ route('detalhes.index', [$plano->url, $detalhe->id]) }}" class="active">Detalhes</a></li> --}}
    </ol>
    <h1>
       Detalhes do Plano {{$plano->nome}}

        <a class="btn btn-dark" href="{{ route('detalhes.create', $plano->url) }}"> Add <i class="fa-solid fa-plus"></i></i></a>

    </h1>

@stop

@section('content')
    <div class="card">

        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>

                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($detalhes as $detalhe)
                        <tr>
                            <td>{{ $detalhe->nome }}</td>
                            <td style="width: 350px">

                                <a class="btn btn-primary" href="{{ route('detalhes.show', [$plano->url,$detalhe->id ]) }}"><i class="fa-solid fa-eye"> exibir</i></a>
                                <a class="btn btn-warning" href="{{ route('detalhes.edit', [$plano->url, $detalhe->id]) }}"><i class="fa-solid fa-pen-to-square"> editar</i></a>

                            </td>

                        </tr>

                    @empty
                        <p>Nenhum plano cadastrado!</p>
                    @endforelse

                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filtros))
                {!! $detalhes->appends($filtros)->links() !!}
            @else
                {!! $detalhes->links() !!}
            @endif



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
