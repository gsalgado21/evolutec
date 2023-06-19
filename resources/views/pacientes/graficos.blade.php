@extends('layout.painel')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <center><h3>Relatórios do paciente: {{ $paciente->nome }}</h3></center>
                    <div class="card-header bg-primary text-white">Filtrar por AVD</div>
                    <div class="card-body">
                        <form action="{{ route('relatorio.avd') }}" method="POST">
                            @csrf
                            <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                            <div class="mb-3">
                                <label for="avd_id" class="form-label">AVD:</label>
                                <select name="avd_id" id="avd_id" class="form-select">
                                    <option value="">Selecione uma AVD</option>
                                    <!-- Aqui você pode carregar as opções de AVD dinamicamente -->
                                    @foreach ($avds as $avd)
                                        <option value="{{ $avd->id }}">{{ $avd->descricao }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Filtrar</button>
                            <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-secondary">Voltar</a>
                            
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    @if (isset($resultados['mensal']))
        
        <div class="mx-auto" style="width: 70%;">
            <center><h3>Por Mês</h3></center>
            <canvas id="graficoMensal"></canvas>
        </div>

        <script>
            // Configuração do gráfico mensal
            var ctxMensal = document.getElementById('graficoMensal').getContext('2d');
            var dadosMensal = {!! json_encode($resultados['mensal']) !!};


            var labelsMensal = dadosMensal.map(function(dado) {
                return dado.mes;
            });
            var dataMensal = dadosMensal.map(function(dado) {
                return dado.total;
            });

            console.log('Labels Mensal:', labelsMensal);
            console.log('Data Mensal:', dataMensal);

            var minValue = Math.min(...dataMensal);
            var min = Math.floor(minValue) - 1;


            var graficoMensal = new Chart(ctxMensal, {
                type: 'bar',
                data: {
                    labels: labelsMensal,
                    datasets: [{
                        label: 'Registros Mensais',
                        data: dataMensal,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x:{
                            suggestedMin: 0,
                            beginAtZero: false,
                            stepSize: 1
                        },
                        yAxes: [{
                            ticks: {
                                beginAtZero: false,
                                stepSize: 1,
                                suggestedMin: min,
                            }
                        }]
                    }
                }
            });
           
        </script>
    @endif



    @if (isset($resultados['anual']))
        <div class="mx-auto" style="width: 70%;">
            <center><h3>Por Ano</h3></center>
            <canvas id="graficoAnual"></canvas>
        </div>

        <script>
            // Configuração do gráfico anual
            var ctxAnual = document.getElementById('graficoAnual').getContext('2d');
            var dadosAnual = {!! $resultados['anual'] !!};

            var labelsAnual = dadosAnual.map(function(dado) {
                return dado.ano;
            });
            var dataAnual = dadosAnual.map(function(dado) {
                return dado.total;
            });

            var minValue = Math.min(...dataAnual);
            var min = Math.floor(minValue) - 1;

            var graficoAnual = new Chart(ctxAnual, {
                type: 'bar',
                data: {
                    labels: labelsAnual,
                    datasets: [{
                        label: 'Registros Anuais',
                        data: dataAnual,
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x:{
                            suggestedMin: 0,
                            beginAtZero: false,
                            stepSize: 1
                        },
                        yAxes: [{
                            ticks: {
                                beginAtZero: false,
                                stepSize: 1,
                                suggestedMin: min
                            }
                        }]
                    }
                }
            });
        </script>
    @endif


@endsection
