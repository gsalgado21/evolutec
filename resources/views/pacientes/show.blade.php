@extends('layout.painel')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12"><br>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0">Detalhes do Paciente</h3>
                <a href="{{ route('pacientes.graficos', ['id' => $paciente->id]) }}" class="btn btn-primary">Ver Gráficos</a>
                <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Voltar</a>
            </div>

            <div class="card bg-info">
                <div class="card-body">
                    <h4 class="card-title">{{ $paciente->nome }}</h4>
                    <h5 class="card-subtitle mb-2 text-muted"><b>Profissional Responsável:</b> {{ $paciente->profissional->nome }}</h5>
                    <p class="card-text">CPF: {{ $paciente->cpf }}</p>
                    <p class="card-text">E-mail: {{ $paciente->email }}</p>
                    <p class="card-text">Criado em: {{ $paciente->created_at->format('d/m/Y H:i:s') }}</p>
                    <p class="card-text">Última atualização em: {{ $paciente->updated_at->format('d/m/Y H:i:s') }}</p>
                </div>
            </div>
        </div>
    </div>
<br>

    <div class="row bg-light">
        <div class="col-md-12">
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Relatórios</th>
                        <th scope="col">Data de Criação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paciente->relatorios as $relatorio)
                    <tr>
                        <th scope="row">{{ $relatorio->id }}</th>
                        <td>{{ $relatorio->relatorio }}</td>
                        <td>{{ $relatorio->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <!-- Formulário para Adicionar um Novo Relatório -->
            <form method="POST" action="{{ route('pacientes.relatorios.store', $paciente->id) }}">
                @csrf
                <div class="form-group">
                    <label for="relatorio">Novo Relatório:</label>
                    <textarea class="form-control" name="relatorio" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Adicionar Relatório</button>
            </form>
        </div>
    </div>

    <br>


    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>CIDs relacionados</h3>
            </div>
            <div class="card bg-light">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Cód</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cids as $cid)
                        <tr>
                            <td>{{ $cid->cod }}</td>
                            <td>{{ $cid->descricao }}</td>
                            <td>
                                <form action="{{ route('pacientes.cid.destroy', [$paciente, $cid]) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">
                                <br><br>
                                <form action="{{ route('pacientes.cid.store', $paciente) }}" method="POST">
                                    @csrf
                                    <div class="form-group d-flex flex-row">
                                        <label for="cid_id">CID:</label>
                                        <select name="cid_id" id="cid_id" class="form-control select2">
                                            <option value="">Selecione um CID...</option>
                                            @foreach($cids_disponiveis as $cid)
                                            <option value="{{ $cid->id }}">{{ $cid->cod }} - {{ $cid->descricao }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-primary">Adicionar</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br>


@endsection
