<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Cid;
use Illuminate\Http\Request;


class CidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function import(Request $request)
    {
        
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);

        $file = $request->file('file');
        $delimiter = ';';

        $handle = fopen($file, "r");
        $header = true;
        
    
        while (($row = fgetcsv($handle, 100000, $delimiter)) !== false) {
            if ($header) {
                $header = false;
                continue;
            }

            $cid = new Cid();
            $cid->cod = $row[0];
            $cid->descricao = utf8_encode($row[1]);
            $cid->save();
        }

        fclose($handle);

        return redirect()->back()->with('success', 'CIDs importados com sucesso!');
    }

    public function search(Request $request)
{
    $termo = $request->input('termo');

    // Realize a lógica de pesquisa com base no termo recebido
    $resultados = Cid::where('descricao', 'LIKE', '%' . $termo . '%')->get();

    // Retorne os resultados em formato JSON
    return response()->json($resultados);
}

}
