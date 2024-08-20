@extends('layouts.plantilla')
@section('content')
     <!-- REBOON separador-->
   <div class="row ">
    <div id="separator-ribbon" class="justify-content-center">
      <div class="content" style="background-color: yellow;"> 
        <div class="row justify-content-center">
          <h1 style="font-family: serif; font-size: 30pt; font-size-adjust: 1.2 d-no d-md-block ; text-decoration: underline; font-weight: bolder;">Actualizar Bebida</h1>
        </div>    
      </div>
    </div>
   </div>
 
    
      <div class="card-body ">
        <form class="was-validated " action="{{route('menu.update',$plato->id)}}" class="form-control" method="post"  enctype="multipart/form-data">
          @csrf
          {{method_field('PUT')}}
          <div class="row justify-content-center" >
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Nombre del Plato</label>
                <input type="text" id="fname" name="txtNombre" class="form-control" placeholder="Enter ..." value="{{$plato->nombre}}" required>
                <div class="valid-feedback">
                  Campo obligatorio
                </div>
              </div>

            </div>    
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-6">
              <!-- textarea -->
              <div class="form-group">
                <label>Descripción</label>
                <textarea class="form-control"name="txtDescripcion" rows="3" placeholder="Enter ..."  required>{{$plato->descripcion}}</textarea>
                <div class="valid-feedback">
                  Campo obligatorio
                </div>
              </div>
            </div>
            
          </div>
          <diV  class="row justify-content-center">
            <label for="paltos"> Tipo de Platos</label>  
            <br>    
            <select class="form-select" name="idtipo" id="TipoPlato">
                @foreach ($tipos as $item)
                   <option value="{{$item->id}}"
                    @if ($plato->idtipo==$item->id)
                        selected
                    @endif
                    >{{$item->nombre}}</option> 
                @endforeach
            </select>
          </diV>
          <div class="row justify-content-center">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Precio</label>
                <input type="number" name="txtPrecio"  step="0.01" min="1" id="Precio" class="form-control"  placeholder="Enter ..."  value="{{$plato->precio}}" required>
                <div class="invalid-feedback">
                  (Solo se permiten números).
                 </div>         
              </div>
            </div>    
          </div> 
            
          <div class="row justify-content-center">
            <input type="submit" class="btn bg-warning" value="Actualizar" ></button>
          </div> 
        </form>
      </div>

  
   
    

    @endsection