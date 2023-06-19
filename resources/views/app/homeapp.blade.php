@extends('layout.painelapp')

@section('content')
<br>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow rounded">
        <div class="card-body">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="text-end">
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <button class="btn btn-sm btn-outline-secondary">Logout</button>
                            </a>
                        </div>
                    </div>
                </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <img src="{{asset('imgs/logo-top.png')}}" class="" width='auto' height='135px'>
                            <br><br>
                            <p><h4>Bem-vindo {{ Auth::user()->name }}</h4></p>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="d-grid gap-2">
                            <button type="button"  id="btnregistrarAto" class="btn btn-primary">Registrar ato</button>
                            <button type="button"  id="btnconsultarAtos"class="btn btn-primary">Consultar atos</button>

                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <div id="registrarAto" style="display:none;">
                            <div class="card card-body">
                                <h3>Registrar Ato</h3>
                                <form method="POST" action="{{ route('atos.store') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="avd_id" class="form-label">Qual atividade aconteceu?</label>
                                        <select name="avd_id" id="avd_id" class="form-select">
                                            @foreach ($avds as $avd)
                                            <option value="{{ $avd->id }}">{{ $avd->descricao }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                </form>
                            </div>
                        </div>
                        <div id="consultarAtos" style="display:none;">
                            <div class="card card-body">
                                <h3>Lista de Atos Registrados</h3>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Atividade registrada</th>
                                            <th>Data/Hora</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($atos as $ato)
                                        <tr>
                                            <td>
                                                @php
                                                $avd = $avds->where('id', $ato->avd_id)->first();
                                                if ($avd) {
                                                    echo $avd->descricao;
                                                }
                                                @endphp
                                            </td>
                                            <td>{{ $ato->data_hora }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Ao clicar no botão "Registrar ato"
            $('#btnregistrarAto').click(function() {
                $('#consultarAtos').hide();
                $('#registrarAto').show();
            });

            // Ao clicar no botão "Consultar atos"
            $('#btnconsultarAtos').click(function() {
                $('#registrarAto').hide();
                $('#consultarAtos').show();
            });
        });
    </script>
@endsection
