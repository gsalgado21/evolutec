@extends('layout.painel')

@section('content')
<br><div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0">Profissionais</h3>
                <a href="{{ route('profissionais.create') }}" class="btn btn-success mb-3">Novo Profissional</a>
            </div>

            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CRM</th>
                            <th>Nome</th>
                            <th>Especialidade</th>
                            <th>Tipo</th>
                            <th>Atualizado em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($profissionais as $profissional)
                        <tr>
                            <td>{{ $profissional->id }}</td>
                            <td>{{ $profissional->crm }}</td>
                            <td>{{ $profissional->nome }}</td>
                            <td>{{ $profissional->especialidade }}</td>
                            <td>{{ $profissional->tipo }}</td>
                            <td>{{ $profissional->updated_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <form action="{{ route('profissionais.destroy', $profissional->id) }}" method="POST">
                                    <a href="{{ route('profissionais.show', $profissional->id) }}" class="btn btn-sm btn-primary mr-1">Ver</a>
                                    <a href="{{ route('profissionais.edit', $profissional->id) }}" class="btn btn-sm btn-warning mr-1">Editar</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir o profissional {{ $profissional->nome }}?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
