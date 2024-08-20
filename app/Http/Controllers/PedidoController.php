<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Models\Plato;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
// use PDF;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::where('eliminado',0)->get();
        return view('pedidos.index',compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $platos = Plato::where('eliminado',0)->where('activo',1)->get();
        return view('pedidos.create',compact('platos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pedido=new Pedido();
        $pedido->nombreCliente=$request->nombre;
        $pedido->apellidosCliente=$request->apellidos;
        $pedido->correo=$request->email;
        $pedido->celular=$request->telefono;
        $pedido->direccion=$request->direccion;
        $pedido->notas=$request->notas;
        $pedido->delivery = ($request->delivery=="on")?true:false;
        $pedido->monto=$request->total;
        $pedido->user_id = auth()->id();
        $arrDetalle = json_decode($request->detalle, true);
        $pedido->save();
        foreach ($arrDetalle as $detalle) {
            $tempDetalle = new DetallePedido();
            $tempDetalle->pedido_id	 = $pedido->id;
            $tempDetalle->plato_id = $detalle["idProducto"];
            $tempDetalle->cantidad = $detalle["cantidad"];
            $tempDetalle->precio = $detalle["precio"];
            $plato = Plato::find($tempDetalle->plato_id);
            $plato->stockDiario = $plato->stockDiario - $tempDetalle->cantidad;
            if($tempDetalle->cantidad!=0){
                $tempDetalle->save();
            }
            $plato->update();
        }
        return redirect('pedidos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        $platos = Plato::where('eliminado',0)->where('activo',1)->where('stockDiario','>',0)->get();

        foreach ($platos as $plato) {
            $plato->cantidad = 0;
            $plato->idDetalle = 0;
            foreach($pedido->detalle as $detalle){
                if($detalle->plato_id == $plato->id){
                    $plato->cantidad = $detalle->cantidad;
                    $plato->idDetalle = $detalle->id;
                }
            }
        }
        return view('pedidos.edit',compact('platos','pedido'));
    }

    public function createPDF(Pedido $pedido){
        // return view('pedidos.pdf_view', compact('pedido'));
        $orientation = 'landscape';
        $customPaper = array(0,0,950,950);
        $pdf = App::make('dompdf.wrapper');
        $pdf = PDF::loadview('pedidos.pdf_view',compact('pedido'))->setPaper('letter', $orientation);
        $nombreArchivo = "V-".str_repeat('0',5 - strlen(''.$pedido->id) ).$pedido->id.'_'.now()->format('d-m-Y').'.pdf';
        return $pdf->download($nombreArchivo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {        
        $pedido->nombreCliente=$request->nombre;
        $pedido->apellidosCliente=$request->apellidos;
        $pedido->correo=$request->email;
        $pedido->celular=$request->telefono;
        $pedido->direccion=$request->direccion;
        $pedido->notas=$request->notas;
        $pedido->delivery = ($request->delivery=="on")?true:false;
        $pedido->monto=$request->total;
        $pedido->user_id = auth()->id();
        $arrDetalle = json_decode($request->detalle, true);
        $pedido->update();
        foreach ($arrDetalle as $detalle) {
            if($detalle['idDetalle']==0){
                $tempDetalle = new DetallePedido();
                $tempDetalle->pedido_id	 = $pedido->id;
                $tempDetalle->plato_id = $detalle["idProducto"];
                $tempDetalle->cantidad = $detalle["cantidad"];
                $tempDetalle->precio = $detalle["precio"]*$detalle["cantidad"];
                
                $plato = Plato::find($tempDetalle->plato_id);
                $plato->stockDiario = $plato->stockDiario - $tempDetalle->cantidad;

                if($tempDetalle->cantidad!=0){
                    $tempDetalle->save();
                }
                $plato->update();
            }else{
                $tempDetalle = DetallePedido::find($detalle['idDetalle']);
                if($detalle["cantidad"]==0){
                    $tempDetalle->activo = 0;
                    $tempDetalle->eliminado = 1;
                }else if($detalle["cantidad"]!=$tempDetalle->cantidad){
                    $tempDetalle->activo = 1;
                    $tempDetalle->eliminado = 0;
                }
                $plato = Plato::find($tempDetalle->plato_id);
                $plato->stockDiario = $plato->stockDiario - ($detalle["cantidad"] - $tempDetalle->cantidad);
                $tempDetalle->cantidad = $detalle["cantidad"];
                $tempDetalle->update();
                $plato->update();
            }
        }
        return redirect('pedidos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->activo=0;
        $pedido->eliminado=1;
        $pedido->update();
        return redirect()-route('pedidos.index');
    }
}
