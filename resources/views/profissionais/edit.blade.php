@extends('layout.painel')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0">Editar Profissional</h3>
                <a href="{{ route('profissionais.index') }}" class="btn btn-secondary">Voltar</a>
            </div>

            <form action="{{ route('profissionais.update', $profissional->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="crm">CRM</label>
                    <input type="number" class="form-control" id="crm" name="crm" value="{{ $profissional->crm }}" required>
                </div>
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ $profissional->nome }}" required>
                </div>
                <div class="form-group">
                    <label for="especialidade">Especialidade</label>
                    <input type="text" class="form-control" id="especialidade" name="especialidade" value="{{ $profissional->especialidade }}" required>
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <select class="form-control" id="tipo" name="tipo" required>
                        <option value="1" @if($profissional->tipo == 1) selected @endif>Profissional</option>
                        <option value="2" @if($profissional->tipo == 2) selected @endif>Profissional/ADM</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="text" class="form-control" name="email" value="{{ $profissional->email }}" />
                </div>
                <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="text" class="form-control" name="password" />
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>
@endsection
