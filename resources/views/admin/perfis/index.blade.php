@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
<nav aria-label="breadcrumb">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="{{ route('perfis.index') }}">Perfis</li>
    </ol>
  </nav>
    {{-- <ol class="breadcrumb">
        <li class="breadcrumb-item"></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="">perfis</a></li>

    </ol> --}}
    <h1>
        perfis

        <a class="btn btn-dark" href="{{ route('perfis.create') }}"> Add <i class="fa-solid fa-plus"></i></i></a>

    </h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">

            <form action="{{ route('perfis.pesquisa') }}" method="post" class="form form-inline">
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
                    @forelse ($perfis as $perfil)
                        <tr>
                            <td>{{ $perfil->nome }}</td>
                            <td>{{ $perfil->descricao }}</td>

                            <td style="width: 350px">

                                {{-- <a class="btn btn-dark" href="{{ route('detalhes.index', $perfil->id) }}"><i class="fa-solid fa-eye"> Detalhes</i></a> --}}
                                <a class="btn btn-primary" href="{{ route('perfis.show', $perfil->id) }}"><i class="fa-solid fa-eye"></i></a>
                                <a class="btn btn-warning" href="{{ route('perfis.edit', $perfil->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>

                            </td>

                        </tr>

                    @empty
                        <p>Nenhum perfi cadastrado!</p>
                    @endforelse

                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filtros))
                {!! $perfis->appends($filtros)->links() !!}
            @else
                {!! $perfis->links() !!}
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
