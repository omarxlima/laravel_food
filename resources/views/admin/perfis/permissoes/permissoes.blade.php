@extends('adminlte::page')

@section('title', 'Permissoes' )

@section('content_header')
<nav aria-label="breadcrumb">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="{{ route('permissoes.index') }}">permissoes</li>
    </ol>
  </nav>
    {{-- <ol class="breadcrumb">
        <li class="breadcrumb-item"></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="">permissoes</a></li>

    </ol> --}}
    <h1>
        permissoes do Perfil {{ $perfil->nome}}

        <a class="btn btn-dark" href="{{ route('permissoes.create') }}"> Add <i class="fa-solid fa-plus"></i></i></a>

    </h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">

            <form action="{{ route('permissoes.pesquisa') }}" method="post" class="form form-inline">
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
                        <th>Descricao</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($permissoes as $permissao)
                        <tr>
                            <td>{{ $permissao->nome }}</td>
                            <td>{{ $permissao->descricao }}</td>

                            <td style="width: 350px">

                                {{-- <a class="btn btn-dark" href="{{ route('detalhes.index', $permissao->id) }}"><i class="fa-solid fa-eye"> Detalhes</i></a> --}}
                                <a class="btn btn-primary" href="{{ route('permissoes.show', $permissao->id) }}"><i class="fa-solid fa-eye"></i></a>
                                <a class="btn btn-warning" href="{{ route('permissoes.edit', $permissao->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>

                            </td>

                        </tr>

                    @empty
                        <p>Nenhuma permissão cadastrada!</p>
                    @endforelse

                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filtros))
                {!! $permissoes->appends($filtros)->links() !!}
            @else
                {!! $permissoes->links() !!}
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
