@extends('layout.painel')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12"><br>
            <h3 class="mb-3">Detalhes do AVD</h3>

            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $avd->descricao }}</h3>

                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text"><strong>ID:</strong> {{ $avd->id }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="card-text"><strong>Criado em:</strong> {{ $avd->created_at->format('d/m/Y H:i:s') }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text"><strong>Última atualização:</strong> {{ $avd->updated_at->format('d/m/Y H:i:s') }}</p>
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col-md-12"><br>
                            <a href="{{ route('avds.edit', $avd->id) }}" class="btn btn-primary">Editar</a>
                            <a href="{{ route('avds.index') }}" class="btn btn-secondary">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
