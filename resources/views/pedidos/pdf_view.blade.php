<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;

        }
    </style>
</head>
{{--  style="box-sizing:border-box;height: 100%; width:100%; margin:0"  --}}

<body>
    <div style="width: 100%; justify-content:space-between;">
        <div style="float:left">
            <h1>POLLERIA "EL RICO DI"</h1>
        </div>
        <div style="margin-left:auto">
            <table
                style="text-align: center; border: 1px solid black; border-radius:7px; font-size:22px; border-spacing: 0; margin-left:auto">
                <thead>
                    <tr>
                        <td><b>R.U.C. 10111222333</b></td>
                    </tr>
                    <tr style="background-color: #a9a9a9;">
                        <td>
                            <b>BOLETA DE VENTA</b>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>N° {{ str_repeat('0', 5 - strlen('' . $pedido->id)) . $pedido->id }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div style="margin: 22px 0px 18px 0px; width:100%; font-size: 24px;">
        <div style="float:left">
            <p style="margin:0">Trabajador: {{ $pedido->usuario->trabajador->nombre }} {{ $pedido->usuario->trabajador->apellidoPaterno }} {{ $pedido->usuario->trabajador->apellidoMaterno }}</p>
        </div>
        <div style="margin-left:auto">
            <p style="text-align:right;margin:0">Fecha: {{ (explode(" ", $pedido->created_at))[0] }}</p>
        </div>
    </div>
    <div style="width: 100%; padding: 4px 0px 3px 0px; align-items:center;">
        <div style="float: left;padding: 0px 22px 0px 0px">
            <table style="width:100%; font-size: 24px;">
                <tr>
                    <td >Cliente: </td>
                    <td style="border-bottom: solid 1px black; padding-left: 1ch">{{ $pedido->nombreCliente }}
                        {{ $pedido->apellidosCliente }}</td>
                </tr>
                <tr style="margin-left:auto">
                    <td style="padding-top:16px; width: 10px">Cel: </td>
                    <td align="center" style="border-bottom: solid 1px black;padding-top:16px; width: 12ch">{{ $pedido->celular }}</td>
                    <td style="padding-top:16px; width: 100px">Direccion: </td>
                    <td style="border-bottom: solid 1px black; padding:16px 1ch 0px 1ch; width: 60%">{{ $pedido->direccion }}</td>
                </tr>
            </table>
        </div>
        <div style="margin-left: auto">
            <table
                style="text-align: center; border: 1px solid black; border-radius:7px; font-size:22px; border-spacing: 0; margin-left:auto">
                <thead>
                    <tr>
                        <td style="padding:4px 12px" colspan="2">Delivery</td>
                    </tr>
                    <tr style="">
                        <td
                            style="width: 50%;border-right: 1px solid black;border-top: 1px black solid; border-bottom:1px black solid">
                            SI</td>
                        <td style="width: 50%;border-top: 1px black solid; border-bottom:1px black solid">NO</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width: 50%;border-right: 1px solid black">{{ $pedido->delivery == 1 ? 'X' : '' }}
                        </td>
                        <td style="width: 50%;">{{ $pedido->delivery == 0 ? 'X' : '' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div style="padding: 20px 8px 0px 8px">
        <table
            style="width:100%;border: 1px solid black; border-radius:10px; font-size:22px; border-spacing: 0; overflow:hidden">
            <thead>
                <tr style="background-color: #d9d9d9;">
                    <th
                        style="border-bottom: 1px solid black; border-right: solid 1px black;width:4ch; padding: 4px 6px">
                        Cant.</th>
                    <th
                        style="border-bottom: 1px solid black;border-left: solid 1px black;border-right: solid 1px black">
                        Descripcion</th>
                    <th
                        style="border-bottom: 1px solid black;border-left: solid 1px black;border-right: solid 1px black;width:10ch; padding: 4px 6px">
                        P.Unit</th>
                    <th
                        style="border-bottom: 1px solid black;border-left: solid 1px black;width:12ch; padding: 4px 6px">
                        Importe</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedido->detalle as $detalle)
                 @if ( $detalle->eliminado==0)
                  <tr style="">
                    <td style="padding: 3px 0px;border-bottom: 1px solid black; border-right: solid 1px black"
                        align="center">{{ $detalle->cantidad }}</td>
                    <td
                        style="padding: 3px 0px 3px 1ch;border-bottom: 1px solid black;border-right: solid 1px black;border-left: solid 1px black">
                        {{ $detalle->plato->nombre }}</td>
                    <td style="padding: 3px 0px;border-bottom: 1px solid black;border-right: solid 1px black;border-left: solid 1px black"
                        align="center">S/{{ $detalle->plato->precio }}</td>
                    <td style="padding: 3px 0px;border-bottom: 1px solid black;border-left: solid 1px black"
                        align="center">S/{{ $detalle->plato->precio * $detalle->cantidad }}</td>
                </tr>
                 @endif
                    
                @endforeach
            </tbody>
            <tfoot>
                <tr style="background-color: #d9d9d9;">
                    <td style="font-weight:bolder" colspan="3" align="right"><b>TOTAL: </b></td>
                    <td style="font-weight:bolder" align="center"> S/.{{ $pedido->monto }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

</body>

</html>
