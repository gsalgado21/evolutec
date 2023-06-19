<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profissional;

class ProfissionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = Profissional::get();
        return $resultado;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $informacoes)
    {
        $result = Profissional::create([
            'crm'=>$informacoes->crm,
            'nome'=>$informacoes->nome,
            'especialidade'=>$informacoes->especialidade,
            'tipo'=>$informacoes->tipo,
        ]);
        return ($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resultado = Profissional::findOrFail($id);
        return $resultado;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $informacoes, $id)
    {
        $resultado = Profissional::findOrFail($id);
        if ($informacoes->crm)
            $resultado->crm           = $informacoes->crm;
        
        if ($informacoes->nome)
            $resultado->nome          = $informacoes->nome;
    
        if ($informacoes->especialidade)
            $resultado->especialidade = $informacoes->especialidade;

        if ($informacoes->tipo)
            $resultado->tipo          = $informacoes->tipo;

        $resultado->save();
        return $resultado;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resultado = Profissional::findOrFail($id);
        $resultado->delete();
        return "registro apagado com sucesso!!!";
    }
}
