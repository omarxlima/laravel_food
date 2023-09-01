{{-- @include('admin.includes.alerts') --}}

<div class="form-group">
    <label for="">Nome:</label>
    <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" placeholder="Nome" value="{{$plano->nome ?? old('nome')}}">
    @error('nome')
    <div class="alert text-danger">{{ $message }}</div>
@enderror
</div>
<div class="form-group">
    <label for="">Preço:</label>
    <input type="text" name="preco" class="form-control @error('preco') is-invalid @enderror" placeholder="Preço" value="{{$plano->preco ?? old('preco')}}">
    @error('preco')
    <div class="alert text-danger">{{ $message }}</div>
@enderror
</div>
<div class="form-group">
    <label for="">Descrição:</label>
    <input type="text" name="descricao" class="form-control  @error('descricao') is-invalid @enderror" placeholder="Descrição" value="{{$plano->descricao ?? old('descricao')}}">
    @error('descricao')
    <div class="alert text-danger">{{ $message }}</div>
@enderror
</div>
