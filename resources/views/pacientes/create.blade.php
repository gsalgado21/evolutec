@extends('layout.painel')

@section('content')
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                        <div class="card-header d-flex flex-row"><h4>Editar Paciente</h4><div class="d-flex flex-row-reverse w-50"><a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Voltar</a></div></div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="post" action="{{ route('pacientes.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control" name="nome" />
                            </div>
                            <div class="form-group">
                                <label for="cpf">CPF:</label>
                                <input type="text" class="form-control" name="cpf" />
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input type="text" class="form-control" name="email" />
                            </div>
                            <div class="form-group">
                                <label for="profissional_id">Profissional:</label>
                                <select class="form-control" name="profissional_id">
                                    @foreach ($profissionais as $profissional)
                                        <option value="{{ $profissional->id }}">{{ $profissional->nome }}</option>
                                    @endforeach
                                </select>
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
        </div>
    </div>

@endsection