@extends('layout.painel')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12"><br>
            <h3 class="mb-3">Editar AVD</h3>

            <form action="{{ route('avds.update', $avd->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <input type="text" class="form-control" name="descricao" id="descricao" value="{{ $avd->descricao }}" required>
                </div>

                <div class="form-group">
                    <br>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{ route('avds.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
