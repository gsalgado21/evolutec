<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Avd;
use Illuminate\Http\Request;

class AvdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avds = Avd::all(); 
        return view('avds.index', ['avds' => $avds]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $avds = AVD::all();
        return view('avds.create', compact('avds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|max:255',
        ]);

        $result = Avd::create([
            'descricao'=>$request->descricao
        ]);
        return redirect()->route('avds.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ato  $ato
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $avd = Avd::findOrFail($id);
        return view('avds.show', compact('avd'));
    }

    public function edit($id)
    {
        $avd = Avd::find($id);
        return view('avds.edit', compact('avd'));
    }

    public function update(Request $request, $id)
    {
        $avd = Avd::findOrFail($id);
        if ($request->descricao)
            $avd->descricao          = $request->descricao;

        $avd->save();
        return redirect()->route('avds.index');
    }

    public function destroy($id)
    {
        $resultado = Avd::findOrFail($id);
        $resultado->delete();
        return redirect('/avds')->with('success', 'Paciente removido com sucesso!');
    }
}
