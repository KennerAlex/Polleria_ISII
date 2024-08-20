@extends('layouts.plantilla')
@section('content')
    <div class="card h-100">
        <div class="card-header pt-2 d-flex " style="justify-content: space-between">
            <div class="row w-100">
                <div class="w-100" style="display: flex; gap: 7px">
                    <div style="flex-grow:1" class="card-title">
                        <h3 class="m-0">Listado Platos</h3>
                    </div>
    
                    <div style="flex-shrink:1" class="float-right">
                        <button type="button" class="btn btn-primary btn-block border-dark" data-toggle="modal"
                            data-target="#createModal">
                            Crear Plato
                        </button>
                    </div>
                    <div  style="flex-shrink:1" class=" float-right">
                        <button type="button" class="btn btn-success btn-block border-dark" data-toggle="modal"
                            data-target="#menuModal">
                            Configurar Menu
                        </button>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="card-body">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <div class="card h-100">

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap h-100" style="overflow-y: auto">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Nombre</th>
                                        <th>Tipo Plato</th>
                                        <th>Precio</th>
                                        <th class="text-center">Activo</th>
                                        <th>StockDiario</th>
                                        <th class="text-center">Operaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($platos as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->nombre }}</td>
                                            <td>{{ $item->tipoPlato->descripcion }}</td>
                                            <td>S/.{{ $item->precio }}</td>
                                            <td class="text-center">
                                                {{ ($item->activo)?"SI":"NO" }}
                                            </td>
                                            <td>{{ $item->stockDiario }}</td>
                                            <td>
                                                <div class="d-flex" style="gap: 12px; justify-content:center">
                                                    <div>
                                                        <button onclick="showDetail(event)" type="button"
                                                            class="btn btn-primary btn-sm border-dark" data-toggle="modal"
                                                            data-target="#updateModal">
                                                            <i class="fas fa-pencil"></i> Editar</a>
                                                        </button>
                                                        <div class="d-none update-capsule">
                                                            <form action=" {{ route('platos.update', $item) }} "
                                                                class="form" method="POST">
                                                                {{ method_field('PUT') }}
                                                                @csrf
                                                                <div>
                                                                    <div class="form-group">
                                                                        <label for="">Nombre: </label>
                                                                        <input class="form-control" name="nombrePlato" type="text" value="{{ $item->nombre }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Descripcion: </label>
                                                                        <input class="form-control" name="descripcionPlato" type="text"
                                                                            value="{{ $item->descripcion }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Tipo Plato: </label>
                                                                        <input class="form-control" type="text" readonly value="{{ $item->tipoPlato->descripcion }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Precio: </label>
                                                                        <input class="form-control" name="precioPlato" type="number"
                                                                            value="{{ $item->precio }}">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Regresar</button>
                                                                        <button type="submit" type="button"
                                                                            class="btn btn-primary">
                                                                            Actualizar
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <form action="{{ route('platos.destroy', $item->id) }}"
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
    <div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action=" {{ route('setMenu') }} " class="form" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Menu del dia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap h-100" style="overflow-y: auto">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nombre</th>
                                    <th>Tipo Plato</th>
                                    <th>Precio</th>
                                    <th>Activo</th>
                                    <th>StockDiario</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($platos as $item)
                                    <tr>
                                        <td>
                                            <input hidden type="text" name="idPlato[]" value="{{ $item->id }}">
                                            {{ $item->id }}
                                        </td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->tipoPlato->descripcion }}</td>
                                        <td>S/.{{ $item->precio }}</td>
                                        <td>
                                            <input hidden type="number" name="activo[]" value="{{ $item->activo }}"><input  type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"
                                                @if ($item->activo) checked @endif /> Activo
                                        </td>
                                        <td>
                                            <input class="form-control" style="width: 70px; text-align:center" name="stock[]" type="number" value="{{ $item->stockDiario }}">
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Regresar</button>
                        <button type="submit" type="button" class="btn btn-primary">
                            Registrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <form action=" {{ route('platos.store') }} " class="form" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Plato</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div>
                            <div class="form-group">
                                <label for="">Nombre: </label>
                                <input name="nombrePlato" class="form-control" type="text" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="">Descripcion: </label>
                                <input name="descripcionPlato" class="form-control" type="text" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="">Tipo Plato: </label>
                                <select class="form-control" name="tipoPlato" id="">
                                    @foreach ($tiposPlato as $item)
                                        <option value="{{ $item->id }}">{{ $item->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Precio: </label>
                                <input name="precioPlato" class="form-control" type="number" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Regresar</button>
                        <button type="submit" type="button" class="btn btn-primary">
                            Registrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Plato</h5>
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
            cuerpoModal = document.querySelector('#updateModal .modal-body');
            target = ev.target;
            parent = target.closest('div')
            cuerpoModal.innerHTML = parent.querySelector('.update-capsule').innerHTML
        }
    </script>
@endsection
