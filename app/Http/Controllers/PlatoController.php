<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use App\Models\TipoPlato;
use Illuminate\Http\Request;

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platos = Plato::where('eliminado',0)->get();
        $tiposPlato = TipoPlato::where('eliminado',0)->get();
        return view('platos.index',compact('platos','tiposPlato'));
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
        $plato = new Plato();
        $plato->nombre = $request->nombrePlato;
        $plato->descripcion = $request->descripcionPlato;
        $plato->tipo_plato_id = $request->tipoPlato;
        $plato->precio = $request->precioPlato;
        // dd($plato->tipo_plato_id);
        $plato->save();
        return redirect()->route('platos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function show(Plato $plato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function edit(Plato $plato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plato $plato)
    {        
        $plato->nombre = $request->nombrePlato;
        $plato->descripcion = $request->descripcionPlato;
        $plato->precio = $request->precioPlato;
        $plato->update();
        return redirect()->route('platos.index');
    }

    public function setMenu(Request $request){
        $arrIdPlato = $request->idPlato;
        $arrActivo = $request->activo;
        $arrStock = $request->stock;
        for ($i=0; $i < sizeof($request->idPlato); $i++) { 
            $plato = Plato::find($arrIdPlato[$i]);
            $plato->activo = $arrActivo[$i];
            $plato->stockDiario = $arrStock[$i];
            $plato->update();
        }
        return redirect()->route('platos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plato  $plato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plato $plato)
    {
        $plato->activo=0;
        $plato->eliminado = 1;
        $plato->update();
        return redirect()->route('platos.index');
    }
}
