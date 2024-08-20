<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabajador;
use Illuminate\Support\Facades\DB;

class TrabajadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $trabajadores = DB ::select('SELECT * FROM trabajadores WHERE eliminado = 0');
        return view('trabajadores.index',compact('trabajadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('trabajadores.create');
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

        $trabajador = new Trabajador();
        $trabajador ->nombre = $request->nombre;
        $trabajador->apellidoPaterno=$request->apellidoPaterno;
        $trabajador->apellidoMaterno=$request->apellidoMaterno;
        $trabajador->sexo=$request->sexo;
        $trabajador->direccion=$request->direccion;
        $trabajador->dni=$request->dni;
        $trabajador->telefono=$request->telefono;
        $trabajador->celular=$request->celular;
        $trabajador->urlImagen = $request->imagenUrl;
        $trabajador->email=$request->email;
        $trabajador->activo = $request->estado;
        $trabajador->save();
        return redirect()->route('trabajadores.index');
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
        $trabajador = Trabajador::find($id);
        return view('trabajadores.edit',compact('trabajador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $trabajadore)
    {
        //
        $trabajador = Trabajador::find($trabajadore);
        $trabajador ->nombre = $request->nombre;
        $trabajador->apellidoPaterno=$request->apellidoPaterno;
        $trabajador->apellidoMaterno=$request->apellidoMaterno;
        $trabajador->sexo=$request->sexo;
        $trabajador->direccion=$request->direccion;
        $trabajador->dni=$request->dni;
        $trabajador->telefono=$request->telefono;
        $trabajador->urlImagen = $request->imagenUrl;
        $trabajador->celular=$request->celular;
        $trabajador->email=$request->email;
        $trabajador->activo = $request->estado;
        $trabajador->save();
        return redirect()->route('trabajadores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($trabajadore)
    {
        //
        $trabajador = Trabajador::find($trabajadore);
        $trabajador->activo = 0;
        $trabajador->eliminado = 1;
        $trabajador->save();
        return back()->with('Borrado', 'El trabajador se eliminó correctamente');
    }
}
