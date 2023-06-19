@extends('layout.painel')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12"><br>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0">Detalhes do Profissional</h3>
                <a href="{{ route('profissionais.index') }}" class="btn btn-secondary">Voltar</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $profissional->nome }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $profissional->especialidade }}</h6>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $profissional->tipo }}</h6>
                    <p class="card-text">CRM: {{ $profissional->crm }}</p>
                    <p class="card-text">E-mail: {{ $profissional->email }}</p>
                    <p class="card-text">Criado em: {{ $profissional->created_at->format('d/m/Y H:i:s') }}</p>
                    <p class="card-text">Última atualização em: {{ $profissional->updated_at->format('d/m/Y H:i:s') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
