@extends('layouts.plantilla')
@section('content')
<div style="" class="">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" overflow-hidden shadow-xl sm:rounded-lg">
          <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                  <div class="card" style=" margin-top: 20px">
                        <div class="card-header" style="font-size: 40px">Nuevo Tipo de Plato</div>
                      <div class="card-body">
                        <form action="{{ route('tipoplato.update',['tipoplato'=>$tipoplato->id])}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                                @csrf
                          {{-- <div class="form-group">
                            <label for="titulo">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $tipoplato->nombre }}"  required>
                          </div> --}}
        
                          <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea  class="form-control" id="descripcion" name="descripcion" rows="5" cols="80" required>{{ $tipoplato->descripcion }}</textarea>
                          </div>
                          <div class="form-group">
                            <label for="estatus">Estado</label>
                            <select class="form-control" id="activo" name="activo" required>
                            <option value="">Seleccionar</option>
                            <option value="1" <?php if($tipoplato->activo==1){ echo "selected";} ?>>Activo</option>
                            <option value="0" <?php if($tipoplato->activo==0){ echo "selected";} ?>>Inactivo</option>
                            </select>
                        </div>
                          <button type="submit" class="btn btn-primary">Actualizar</button>
                          <a class="btn btn-danger" href=""{{route('tipoplato.index')}}>Cancelar</a>
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