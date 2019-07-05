<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entrega;
class ControladorEntrega extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entrega = Entrega::all();
        return $entrega->toJson();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $entrega = new Entrega();
            $entrega->nome = $request->nome;
            $entrega->data_entrega = $request->data_entrega;
            $entrega->origem = $request->origem;
            $entrega->destino = $request->destino;

            if ($entrega->save()){
                return response()->json(array('success' => true, 'id' => $entrega->id), 200);
            }
        } catch (\Exception $e) {
            return response()->json(array('success' => false, 'erro' => $e->getMessage()), 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entrega = Entrega::find($id);
        if (isset($entrega)) {
            return response()->json(array('success' => true, 'data' => $entrega), 200);
        }else{
            return response()->json(array('success' => false, 'erro' => 'Entrega não encontrada'), 404);
        }
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
}
