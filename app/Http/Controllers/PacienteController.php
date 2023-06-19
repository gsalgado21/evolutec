<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Avd;
use App\Models\Paciente;
use App\Models\User;
use App\Models\Cid;
use App\Models\Profissional;
use App\Models\Ato;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PacienteController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        $pacientes = Paciente::when($q, function ($query, $q) {
            return $query->where('nome', 'like', "%$q%");
        })->paginate(10);

        //$pacientes = Paciente::all(); 
        return view('pacientes.index', ['pacientes' => $pacientes]);
    }

    public function create()
    {
        $profissionais = Profissional::all();
        return view('pacientes.create', compact('profissionais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'cpf' => 'required|unique:pacientes|max:14',
            'profissional_id' => 'required|exists:profissionals,id',
        ]);
        
        $paciente = new Paciente();
        $paciente->nome = $request->input('nome');
        $paciente->cpf = $request->input('cpf');
        $paciente->email = $request->input('email');
        $paciente->password = Hash::make($request->input('password'));
        $paciente->profissional_id = $request->input('profissional_id');
        $paciente->save();
        

        User::create([
            'name' => $request->input('nome'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'user_type' => 'pacientes'
        ]);
        return redirect()->route('pacientes.index');
    }

    public function show($id)
    {
        $paciente = Paciente::find($id);
        $cids_disponiveis = Cid::all();
        $cids = $paciente->cids()->get();
        return view('pacientes.show', compact('paciente', 'cids', 'cids_disponiveis'));
    }

    public function edit($id)
    {
        $profissionais = Profissional::all();
        $paciente = Paciente::find($id);
        return view('pacientes.edit', compact('paciente', 'profissionais'));
    }

    public function update(Request $request, $id)
    {
        $paciente = Paciente::find($id);
        $paciente->nome = $request->input('nome');
        $paciente->cpf = $request->input('cpf');
        $paciente->email = $request->input('email');
        $paciente->password = Hash::make($request->input('password'));
        $paciente->profissional_id = $request->input('profissional_id');
        $paciente->save();

        $usuario = User::where('email', $request->input('email'))->first();
        $usuario->name = $request->input('nome');
        $usuario->email = $request->input('email');
        $usuario->password = Hash::make($request->input('password'));
        $usuario->save();
        

        return redirect()->route('pacientes.index');
    }

    public function destroy($id)
    {
        $paciente = Paciente::find($id);
        $paciente->delete();
        return redirect('/pacientes')->with('success', 'Paciente removido com sucesso!');
    }

    public function storeCid(Request $request, Paciente $paciente)
    {
        $data = $request->validate([
            'cid_id' => 'required|exists:cids,id',
        ]);
    
        $paciente->cids()->attach($data['cid_id']);
    
        return redirect()->route('pacientes.show', $paciente);
    }

    public function destroyCid(Paciente $paciente, Cid $cid)
    {
        $paciente->cids()->detach($cid);

    return redirect()->route('pacientes.show', $paciente);
    }

    public function showRelatorios(Paciente $paciente)
    {
        $relatorios = $paciente->relatorios;
        return view('pacientes.relatorios', compact('paciente', 'relatorios'));
    }

    public function storeRelatorio(Request $request, Paciente $paciente)
    {
        $validated = $request->validate([
            'relatorio' => 'required|string|max:255',
        ]);

        $paciente->relatorios()->create($validated);
        
        return redirect()->route('pacientes.show', $paciente->id)->with('success', 'Relatório criado com sucesso!');
    }


    public function graficos($id)
    {
        // Recupere o paciente pelo ID
        $paciente = Paciente::findOrFail($id);
        $avds = Avd::all();

        // Recupere os atos do paciente e suas respectivas AVDs
        $atos = $paciente->ato()->with('avd')->get();
        $resultados = [];
        //dd($atos);
        // Lógica para obter os dados do gráfico (agrupar por mês e ano, contar as AVDs registradas, etc.)

        // Retorne a view de gráficos com os dados necessários
        return view('pacientes.graficos', [
            'paciente' => $paciente,
            'avds' => $avds,
            'resultados' => $resultados,
            //'graficosMensais' => $graficosMensais,
            //'graficosAnuais' => $graficosAnuais,
        ]);
    }


    public function relatorioAvd(Request $request)
    {
        $avdId = $request->input('avd_id');
        $paciente = Paciente::findOrFail($request->input('paciente_id'));
        $avds = Avd::all();
        $resultados = [];


        $resultados['mensal'] = Ato::where('avd_id', $avdId)->where('paciente_id', $request->input('paciente_id'))
            ->select(DB::raw('DATE_FORMAT(data_hora, "%m-%Y") AS mes'), DB::raw('COUNT(*) as total'))
            ->groupBy(DB::raw('MONTH(data_hora)'))
            ->get();
        $resultados['anual'] = Ato::where('avd_id', $avdId)->where('paciente_id', $request->input('paciente_id'))
            ->select(DB::raw('DATE_FORMAT(data_hora, "%Y") AS ano'), DB::raw('COUNT(*) as total'))
            ->groupBy(DB::raw('YEAR(data_hora)'))
            ->get();


        


        return view('pacientes.graficos', compact('resultados', 'paciente', 'avds'));
    }

}
