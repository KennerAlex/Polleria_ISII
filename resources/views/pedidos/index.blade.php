@extends('layouts.plantilla')
@section('content2')
    <div class="card h-100 m-0">
        <div class="card-header pt-2 d-flex " style="justify-content: space-between">
            <div class="row w-100">
                <div class=" col-10 card-title">
                    <h3 class="m-0">Pedidos</h3>
                </div>

                <div class="col-2 float-right">
                    <a href="{{ route('registrar') }}" class="btn btn-success btn-block">Registrar Nuevo</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <div class="card h-100">

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" style="overflow-y: auto">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Correo</th>
                                        <th>Telefono</th>
                                        <th>Direccion</th>
                                        <th>Costo</th>
                                        <th>fecha</th>
                                        <th class="text-center">Operaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pedidos as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->nombreCliente }}</td>
                                            <td>{{ $item->apellidosCliente }}</td>
                                            <td>{{ $item->correo }}</td>
                                            <td>{{ $item->celular }}</td>
                                            <td>{{ $item->direccion }}</td>
                                            <td>S/.{{ $item->monto }}</td>
                                            <td>{{ (explode(' ',$item->created_at))[0]}}</td>
                                            <td>
                                                <div class="d-flex" style="gap: 12px; justify-content:center">
                                                    <div>
                                                        <button onclick="showDetail(event)" type="button"
                                                            class="btn btn-primary btn-sm border-dark" data-toggle="modal"
                                                            data-target="#detailModal">
                                                            <i class="fas fa-list"></i> Ver</a>
                                                        </button>
                                                        <div class="d-none detail-capsule">
                                                            <div style="display: grid; grid-template-columns:auto 1fr">
                                                                <div>
                                                                    <h4>Trabajador: </h4>
                                                                </div>
                                                                <div style="white-space:normal">
                                                                    <h4>
                                                                        {{ $item->usuario->trabajador ->nombre }} {{ $item->usuario->trabajador->apellidoPaterno }}  {{ $item->usuario->trabajador->apellidoMaterno }}
                                                                    </h4>
                                                                </div>
                                                                
                                                            </div>
                                                            <div>
                                                                @foreach ($item->detalle as $detalle)
                                                                @if ($detalle->eliminado == 0 && $detalle->cantidad > 0)
                                                                    <div class="card p-2">
                                                                        <div>
                                                                            <h4>( {{ $detalle->cantidad }} )
                                                                                {{ $detalle->plato->nombre }}</h4>
                                                                        </div>
                                                                        <div>
                                                                            <small>{{ $detalle->plato->descripcion }}</small>
                                                                        </div>
                                                                        <div>
                                                                            <h6>S/{{ $detalle->precio }} x
                                                                                {{ $detalle->cantidad }} =
                                                                                S/{{ $detalle->precio }}
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                            </div>
                                                            
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Regresar</button>
                                                                <a href="{{ route('actualizar', $item) }}" type="button"
                                                                    class="btn btn-primary">Editar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <form action="">
                                                            <a class="btn btn-success btn-sm border-dark"
                                                                href="{{ route('pedidos.pdf', $item) }}" target="_blank">
                                                                <i class="fas fa-clipboard-list"></i> Generar Boleta</a>
                                                        </form>
                                                    </div>
                                                    <div>
                                                        <form action="{{ route('pedidos.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            {{ method_field('DELETE') }}

                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm border-dark">
                                                                <i class="fas fa-trash-alt"></i> Eliminar
                                                            </button>
                                                        </form>
                                                        <br>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalle Pedido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function showDetail(ev) {
            cuerpoModal = document.querySelector('.modal-body');
            target = ev.target;
            test = target.closest('.detail-capsule');
            parent = target.closest('div')
            cuerpoModal.innerHTML = parent.querySelector('.detail-capsule').innerHTML
        }
    </script>
@endsection
