<?php

namespace App\Http\Controllers;

use App\Models\Profissional;
use App\Models\Paciente;
use App\Models\Ato;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Quantidade de Profissionais
        $quantidadeProfissionais = Profissional::count();

        // Quantidade de Pacientes
        $quantidadePacientes = Paciente::count();

        // Gráfico de Atos Cadastrados
        $labels = [];
        $dados = [];

        $startDate = Carbon::now()->subMonths(2)->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $months = collect();

        while ($startDate <= $endDate) {
            $months->push($startDate->format('Y-m'));
            $startDate->addMonth();
        }

        $months->each(function ($month) use (&$labels, &$dados) {
            $startDate = Carbon::parse($month)->startOfMonth();
            $endDate = Carbon::parse($month)->endOfMonth();

            $count = Ato::whereBetween('created_at', [$startDate, $endDate])->count();

            $labels[] = $startDate->format('M Y');
            $dados[] = $count;
        });

        return view('welcome', compact('quantidadeProfissionais', 'quantidadePacientes', 'labels', 'dados'));
    }
}
