<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ato;

class HomeappController extends Controller
{
    public function index()
    {
        // Aqui você pode obter os dados necessários para exibir na view
        $atos = Ato::where('paciente_id', 1) //auth()->user()->id
            ->orderBy('created_at', 'desc')
            ->get(); // Exemplo de obtenção de dados dos atos registrados
        $avds = \App\Models\Avd::all();

        return view('app.homeapp', compact('atos', 'avds'));
    }

    public function store(Request $request)
    {
        // Valide os campos do formulário conforme necessário
        $validatedData = $request->validate([
            'avd_id' => 'required',
            // Outros campos do formulário, se houver
        ]);

        // Crie um novo objeto de Atos
        $ato = new Ato();
        $ato->avd_id = $request->avd_id;
        $ato->paciente_id = 1; // Id do usuário logado - auth()->user()->id
        $ato->data_hora = now(); // Hora atual

        // Salve o ato no banco de dados
        $ato->save();

        // Redirecione para a página inicial ou para onde desejar
        return redirect()->route('homeapp')->with('success', 'Ato registrado com sucesso!');
    }
}