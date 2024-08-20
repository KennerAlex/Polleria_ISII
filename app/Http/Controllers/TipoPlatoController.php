<?php

namespace App\Http\Controllers;

use App\Models\TipoPlato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoPlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipos = DB ::select('SELECT * FROM tipo_platos WHERE activo = 1 and eliminado = 0');
        return view('TipoPlato.index',compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('TipoPlato.create');
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
        $tipoPlato = new tipoPlato();
        // $tipoPlato ->nombre = $request->nombre;
        $tipoPlato->descripcion=$request->descripcion;
        $tipoPlato->activo = $request->estado;
        $tipoPlato->save();
        return redirect()->route('tipoplato.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoPlato  $tipoPlato
     * @return \Illuminate\Http\Response
     */
    public function show(TipoPlato $tipoPlato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoPlato  $tipoPlato
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tipoplato=tipoPlato::find($id);
        return view('TipoPlato.edit',compact('tipoplato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoPlato  $tipoPlato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$tipoplato)
    {
        //
        $tipoPlato = tipoPlato::find($tipoplato);
        // $tipoPlato ->nombre = $request->nombre;
        $tipoPlato ->descripcion = $request->descripcion;
        $tipoPlato->activo = $request->activo;
        $tipoPlato->save();
        return redirect()->route('tipoplato.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoPlato  $tipoPlato
     * @return \Illuminate\Http\Response
     */
    public function destroy($tipoplato)
    {
        //
        $tipoPlato = tipoPlato::find($tipoplato);
        $tipoPlato->activo = 0;
        $tipoPlato->eliminado = 1;
        $tipoPlato->save();
        return back()->with('Borrado', 'El plato se borró correctamente');
    }
}
