@extends('layout.painel')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0">Lista de AVDs</h3>
                <a href="{{ route('avds.create') }}" class="btn btn-success mb-3"   >Novo AVD</a>
            </div>

            <div class="table-responsive">
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descrição</th>
                            <th>Criado em</th>
                            <th>Atualizado em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($avds as $avd)
                            <tr>
                                <td>{{ $avd->id }}</td>
                                <td>{{ $avd->descricao }}</td>
                                <td>{{ $avd->created_at->format('d/m/Y H:i:s') }}</td>
                                <td>{{ $avd->updated_at->format('d/m/Y H:i:s') }}</td>
                                <td>
                                    <a href="{{ route('avds.show', $avd->id) }}" class="btn btn-sm btn-primary">Ver</a>
                                    <a href="{{ route('avds.edit', $avd->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <form action="{{ route('avds.destroy', $avd->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente excluir este AVD?')">Excluir</button>
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
