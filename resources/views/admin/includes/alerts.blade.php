{{-- @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>

@endif --}}


@if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>

@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>

@endif
