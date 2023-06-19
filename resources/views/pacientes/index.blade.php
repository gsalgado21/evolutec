@extends('layout.painel')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="mb-0">Lista de Pacientes</h3>
                    <a href="{{ route('pacientes.create') }}" class="btn btn-success mb-3">Novo Paciente</a>
                </div>

                <div class="table-responsive">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    
                    <form action="{{ route('pacientes.index') }}" method="GET" class="form-inline mb-3">
                        <div class="form-group mr-2 d-flex flex-row">
                            <input type="text" name="q" class="form-control" placeholder="Pesquisar por nome...">
                            <button type="submit" class="btn btn-primary">Filtrar</button>
                        </div>
                        
                    </form>
                    <br>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Profissional</th>
                                <th>Criado em</th>
                                <th>Atualizado em</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pacientes as $paciente)
                                <tr>
                                    <td>{{ $paciente->id }}</td>
                                    <td>{{ $paciente->nome }}</td>
                                    <td>{{ $paciente->cpf }}</td>
                                        <td>{{ $paciente->profissional->nome }}</td>
                                        <td>{{ $paciente->created_at }}</td>
                                        <td>{{ $paciente->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-sm btn-primary mr-1">Ver</a>
                                            <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-sm btn-warning mr-1">Editar</a>
                                            <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="post" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esse paciente?')">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $pacientes->appends(['q' => request()->input('q')])->links() }}
                    </div>
                </div>
        </div>
    </div>

@endsection
        