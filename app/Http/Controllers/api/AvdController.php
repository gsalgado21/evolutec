<?php

namespace App\Http\Controllers\api;

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
        $resultado = Avd::get();
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
        $result = Avd::create([
            'descricao'=>$request->descricao
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
        $resultado = Avd::findOrFail($id);
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
        $resultado = Avd::findOrFail($id);
        if ($request->descricao)
            $resultado->descricao          = $request->descricao;

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
        $resultado = Avd::findOrFail($id);
        $resultado->delete();
        return "registro apagado com sucesso!!!";
    }
}
