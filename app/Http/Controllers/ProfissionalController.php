<?php

namespace App\Http\Controllers;

use App\Models\Profissional;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ProfissionalController extends Controller
{
    public function index()
    {
        $profissionais = Profissional::all();
        $i = 0;
        foreach ($profissionais as $profissional) {
            if ($profissional->tipo == 2)
                $profissionais[$i]->tipo = 'Profissional/ADM do sistema';
            if ($profissional->tipo == 1)   
                $profissionais[$i]->tipo = 'Profissional';
            $i++;
        }

        return view('profissionais.index', compact('profissionais'));
    }

    public function create()
    {
        return view('profissionais.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'crm' => 'required|unique:profissionals,crm',
            'nome' => 'required',
            'especialidade' => 'required',
            'tipo' => 'required',
        ]);

        $profissional = new Profissional();
        $profissional->crm = $request->input('crm');
        $profissional->nome = $request->input('nome');
        $profissional->especialidade = $request->input('especialidade');
        $profissional->email = $request->input('email');
        $profissional->password = Hash::make($request->input('password'));
        $profissional->tipo = $request->input('tipo');
        $profissional->save();

        User::create([
            'name' => $request->input('nome'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'user_type' => 'professionals'
        ]);


        return redirect()->route('profissionais.index')->with('success', 'Profissional criado com sucesso.');
    }

    public function show($id)
    {
        
        $profissional = Profissional::findOrFail($id);
        if ($profissional->tipo == 2)
            $profissional->tipo = 'Profissional/ADM do sistema';
        if ($profissional->tipo == 1)   
            $profissional->tipo = 'Profissional';
        return view('profissionais.show', compact('profissional'));
    }

    public function edit($id)
    {
        $profissional = Profissional::findOrFail($id);  
        return view('profissionais.edit', compact('profissional'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'crm' => 'required|unique:profissionals,crm,' . $id,
            'nome' => 'required',
            'especialidade' => 'required',
            'tipo' => 'required',
        ]);

        //dd($id);

        $profissional = Profissional::find($id);
        $profissional->crm = $request->input('crm');
        $profissional->nome = $request->input('nome');
        $profissional->especialidade = $request->input('especialidade');
        $profissional->email = $request->input('email');
        $profissional->password = Hash::make($request->input('password'));
        $profissional->tipo = $request->input('tipo');
        $profissional->save();

        $usuario = User::where('email', $request->input('email'))->first();
        $usuario->name = $request->input('nome');
        $usuario->email = $request->input('email');
        $usuario->password = Hash::make($request->input('password'));
        $usuario->save();




        return redirect()->route('profissionais.index')->with('success', 'Profissional atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $profissional = Profissional::find($id);
        try {
            // tentativa de excluir o registro na tabela profissionals
            $profissional->delete();
            return redirect()->route('profissionais.index')->with('success', 'Profissional excluído com sucesso.');
        } catch (QueryException $e) {
            // exceção lançada devido a uma restrição de chave estrangeira
            if ($e->errorInfo[1] == 1451) {
                // exibir mensagem de erro personalizada para o usuário
                return redirect()->route('profissionais.index')->with('error', 'Não é possível excluir este profissional porque existem pacientes relacionados a ele.');
            }

        }
    }
}
