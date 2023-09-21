@csrf

<div class="form-group">
    <label for="">Nome:</label>
    <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" placeholder="Nome" value="{{ $detalhe->nome ?? old('nome') }}">
    @error('nome')
    <div class="alert text-danger">{{ $message }}</div>
@enderror

</div>

