@extends('layout.painel')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Resumo</div>
                <div class="card-body">
                    <h5 class="card-title">Quantidade de Profissionais: {{ $quantidadeProfissionais }}</h5>
                    <h5 class="card-title">Quantidade de Pacientes: {{ $quantidadePacientes }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Gráfico de Atos Cadastrados</div>
                <div class="card-body">
                    <canvas id="graficoAtos"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById('graficoAtos').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Quantidade de Atos',
                    data: {!! json_encode($dados) !!},
                    backgroundColor: 'rgba(0, 123, 255, 0.5)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Mês'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Quantidade'
                        }
                    }
                }
            }
        });
    });
</script>

@endsection