<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Ato;
use Illuminate\Http\Request;

class AtoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = Ato::get();
        return $resultado;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = Ato::create([
            'avd_id'=>$request->avd_id,
            'paciente_id'=>$request->paciente_id,
            'data_hora'=>$request->data_hora
        ]);


        return ($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ato  $ato
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resultado = Ato::findOrFail($id);
        return $resultado;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ato  $ato
     * @return \Illuminate\Http\Response
     */
    public function edit(Ato $ato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ato  $ato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $resultado = Ato::findOrFail($id);
        if ($request->avd_id)
            $resultado->avd_id          = $request->avd_id;
        
        if ($request->paciente_id)
            $resultado->paciente_id     = $request->paciente_id;
    
        if ($request->data_hora)
            $resultado->data_hora       = $request->data_hora;

        $resultado->save();
        return $resultado;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ato  $ato
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resultado = Ato::findOrFail($id);
        $resultado->delete();
        return "registro apagado com sucesso!!!";
    }
}
