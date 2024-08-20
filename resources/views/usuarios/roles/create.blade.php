@extends('layouts.plantilla')
@section('content3')
<div style="" class="">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" height: 90vh; overflow:auto">
          <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                  <div class="card" style=" margin-top: 20px">
                        <div class="card-header" style="font-size: 40px">Nuevo Rol</div>
                      <div class="card-body">
                        <form action="{{ route('tipoUsuario.store')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="row">
                            <div class="form-group col-4">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="txtRol" required>
                              </div>
                              
                          </div>
                         
                          <div class="row">
                            <div class="form-group col-4">
                                <label for="estatus">Estado</label>
                                <select class="form-control" id="estado" name="estado" required>
                                  <option value="">Seleccionar</option>
                                  <option value="1">Activo</option>
                                  <option value="0">Inactivo</option>
                                </select>
                              </div>
                          </div>
                          
                          <button type="submit" class="btn btn-primary">Guardar</button>
                          <a class="btn btn-danger" href="{{route('tipoUsuario.index')}}">Cancelar</a>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection