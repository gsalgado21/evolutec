@extends('layout.painel')

@section('content')
    <div class="container">
        <h2>Relatórios do paciente {{ $paciente->nome }}</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Relatório</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($relatorios as $relatorio)
                <tr>
                    <td>{{ $relatorio->id }}</td>
                    <td>{{ $relatorio->relatorio }}</td>
                    <td>{{ $relatorio->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Adicionar novo relatório</h3>
        <form action="{{ route('pacientes.relatorios.store', $paciente) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="relatorio">Relatório:</label>
                <textarea name="relatorio" id="relatorio" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection
