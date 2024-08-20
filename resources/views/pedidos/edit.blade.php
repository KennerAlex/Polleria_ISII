@extends('layouts.plantilla')
@section('content')
    <div class="card h-100">
        <div class="card-header pt-2">
            <div class="card-title">
                <h3 class="m-0">Registro de Pedido</h3>
            </div>
        </div>
        <div class="card-body h-100">
            <form id="formPedido" class="was-validated form h-100" action=" {{ route('pedidos.update', $pedido) }}"
                method="POST" >
                {{ method_field('PUT') }}
                @csrf
                <div class="row h-100">
                    <div class="col-7 border h-100" style="border-radius: 5px">
                        <div class="row h-100">
                            <div class="col-12 py-3 px-2 h-100"
                                style="display: grid; grid-template-columns: repeat(3,1fr); grid-template-rows: repeat(auto-fill,170px); gap: 12px; overflow-y: auto"
                                style="">
                                @foreach ($platos as $item)
                                    <div class="card w-auto h-100 m-0">
                                        {{--  <img src="{{ $item->img }}" class="card-img-top imagenes" alt="...">  --}}
                                        <div class="card-body h-100 d-flex flex-column producto"
                                            style="justify-content:space-between">

                                            <h4 class="card-title"><b>{{ $item->nombre }}</b></h4>
                                            <small class="card-text">{{ $item->descripcion }}</small>
                                            <div class="py-1">
                                                <p class="card-text text-center ">S/{{ $item->precio }}</p>
                                            </div>
                                            <div class="row" style="font-size: 20px">
                                                <div class="col-12" style="display:flex; justify-content:center;">
                                                    <div data-sign="-1"
                                                        class="bg-danger px-3 amount-controller amount.controller-minus"
                                                        style="flex-shrink: 1; font-size: 1.4em; cursor: pointer; user-select: none;">
                                                        - </div>
                                                    <div class="bg-secondary text-center d-flex"
                                                        style="flex-grow: 1; align-items:center; justify-content:center">
                                                        <span class="amount-counter m-auto"
                                                            data-detalle="{{ $item->idDetalle }}"
                                                            data-max="{{ $item->stockDiario }}"
                                                            data-idProducto="{{ $item->id }}"
                                                            data-precio={{ $item->precio }}
                                                            style="user-select: none;">{{ $item->cantidad }}</span>
                                                    </div>
                                                    <div data-sign="1"
                                                        class="bg-success px-3 amount-controller amount-controller-plus"
                                                        style="flex-shrink: 1; font-size: 1.4em; cursor: pointer ; user-select: none;">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-5 py-2 px-2">
                        <div class="row">
                            <div class="col-12">
                                <h4>Cliente</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <label for="">Nombre del Cliente</label>
                                <input name="nombre" id="txtNombre" class="form-control" type="text" required
                                    value="{{ $pedido->nombreCliente }}" />
                            </div>
                            <div class="col-6 form-group">
                                <label for="">Apellido del Cliente</label>
                                <input name="apellidos" id="txtApellidos" class="form-control" type="text" required
                                    value="{{ $pedido->apellidosCliente }}" />
                            </div>
                            <div class="col-8 form-group">
                                <label for="">Correo</label>
                                <input name="email" id="txtEmail" class="form-control" type="email" name=""
                                    value="{{ $pedido->correo }}" id="">
                            </div>
                            <div class="col-4 form-group">
                                <label for="">Telefono</label>
                                <input name="telefono" id="txtTelefono" class="form-control" type="text" required
                                    value="{{ $pedido->celular }}">
                            </div>
                            <div class="col-12 form-group">
                                <label for="">Dirección</label>
                                <input name="direccion" id="txtDireccion" class="form-control" type="text" required
                                    value="{{ $pedido->direccion }}">
                            </div>
                            <div class="col-12 form-group">
                                <label for="">Notas:</label>
                                <textarea class="form-control" name="notas" id="txtNotas" cols="10" rows="5">{{ $pedido->notas }}</textarea>
                            </div>
                            <div class="col-12 form-group">
                                <div class="row">
                                    <div class="col-6 pl-3">
                                        <label class="" for="chkDelivery">Delivery: &nbsp;</label>
                                        <input type="checkbox" class="" name="delivery" id="chkDelivery"
                                            @if ($pedido->delivery) checked @endif>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Total:</label>
                                        <input style="border:none; background:none; text-align: right;" type="number"
                                            readonly name="total" id="txtTotal" value="{{ $pedido->monto }}"></input>
                                    </div>
                                </div>
                            </div>
                            <input hidden type="text" id="txtDetalle" name="detalle">
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <button class="form-control btn btn-primary btn-block" type="submit"
                                    class="btn bg-warning" type="submit"
                                    onclick="enviarInformacion(event)">Registrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script type="module" src="/../../js/amountController.js"></script>
    <script>
        class AmountController {
            static init(selector = null) {
                const context = selector || document;
                var controllers = document.querySelectorAll('.amount-controller');
                for (let controller of controllers) {
                    controller.addEventListener('click', ({
                        target
                    }) => {
                        const controlador = target;
                        const operation = parseInt(controlador.dataset.sign);
                        const amountCounter = controlador.parentNode.querySelector('.amount-counter');
                        console.log(amountCounter, amountCounter.dataset)
                        const maxValue = parseInt(amountCounter.dataset.max)
                        let newValue = parseInt(amountCounter.innerText) + operation
                        if (newValue >= 0 && newValue <= maxValue) {
                            amountCounter.innerText = newValue;
                            const txtTotal = document.getElementById("txtTotal")
                            let currValue = parseFloat(txtTotal.value || 0)
                            console.log(txtTotal, currValue);
                            txtTotal.value = currValue + (amountCounter.dataset.precio * operation);
                        }
                    })
                }
            }
        }

        function enviarInformacion(ev) {
            ev.preventDefault();
            const productos = document.querySelectorAll('.amount-counter');
            const data = []
            let totalSum = 0;
            for (let producto of productos) {

                let tempData = {
                    idDetalle: producto.dataset.detalle,
                    idProducto: producto.dataset.idproducto,
                    cantidad: parseInt(producto.innerText),
                    precio: parseFloat(producto.dataset.precio),
                }
                totalSum += tempData.cantidad * tempData.precio;
                data.push(tempData)
            }
            document.getElementById("txtDetalle").value = JSON.stringify(data);
            document.getElementById("formPedido").submit()
            document.getElementById("txtTotal").value = totalSum;
            document.getElementById
            console.log(data);
        }
        window.onload = () => {
            console.log('domloaded')
            AmountController.init();
        }
    </script>
@endsection
