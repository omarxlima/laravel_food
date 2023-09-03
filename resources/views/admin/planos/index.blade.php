@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
<nav aria-label="breadcrumb">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="{{ route('planos.index') }}">Planos</li>
    </ol>
  </nav>
    {{-- <ol class="breadcrumb">
        <li class="breadcrumb-item"></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="">Planos</a></li>

    </ol> --}}
    <h1>
        Planos

        <a class="btn btn-dark" href="{{ route('planos.create') }}"> Add <i class="fa-solid fa-plus"></i></i></a>

    </h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">

            <form action="{{ route('planos.pesquisa') }}" method="post" class="form form-inline">
                @csrf
                <input type="text" name="filtro" class="form-control" placeholder="Nome"
                    value="{{ $filtros['filtro'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="card-body">
            @include('admin.includes.alerts')

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
                            <td>{{ $plano->nome }}</td>
                            <td>R$ {{ number_format($plano->preco, 2, ',', '.') }}</td>
                            <td style="width: 350px">

                                <a class="btn btn-dark" href="{{ route('detalhes.index', $plano->url) }}"><i class="fa-solid fa-eye"> Detalhes</i></a>
                                <a class="btn btn-primary" href="{{ route('planos.show', $plano->url) }}"><i class="fa-solid fa-eye"></i></a>
                                <a class="btn btn-warning" href="{{ route('planos.edit', $plano->url) }}"><i class="fa-solid fa-pen-to-square"></i></a>

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
                {!! $planos->appends($filtros)->links() !!}
            @else
                {!! $planos->links() !!}
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
