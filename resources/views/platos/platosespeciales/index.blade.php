@extends('layouts.plantilla')
@section('content')
     <!-- REBOON separador-->
   <div class="row ">
    {{-- <div id="separator-ribbon" class="justify-content-center">
      <div class="content" style="background-color: yellow;"> 
        <div class="row justify-content-center"> --}}
          <h1 style="font-family: serif; font-size: 30pt; font-size-adjust: 1.2 d-no d-md-block ; text-decoration: underline; font-weight: bolder;">Platos Especiales</h1>
        {{-- </div>    
      </div>
    </div> --}}
   </div>
 
    <form action="{{route('especiales.create')}}">
      <div class="row">
        <div class="col-10 d-none d-lg-block"></div>
        <div class="col-5 col-sm-2 ">
          <input type="submit" class="btn btn-warning border-dark" value="Agregar Plato">
        </div>
      </div><br>
      
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Platos Especiales</h3> 
            </div>
            <div class="card-columns"> 
              @foreach ($platos as $item)
              <div class="row">
                <div class="col-4" >
                  <div class="card" style="width: 19rem; 
                   margin-left: 10px">
                    <img src="{{$item->img}}" class="card-img-top imagenes" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$item->nombre}}</h5>
                      <p class="card-text">{{$item->descripcion}}</p>
                      <p class="card-text">{{$item->precio}}</p>
                      <div class="row">
                        <div class="col col-sm-5">
                          <form action="{{route('especiales.destroy', $item->id)}}" method="POST">
                            @csrf
                            {{method_field('DELETE')}} 
                            <i class="fas fa-trash-alt"></i>   
                            <input type="submit" class="btn btn-warning btn-sm border-dark"  value="Borrar">   
                        </form>
                        </div>
                       <div class="col col-sm-1"></div>
                       <div class="col col-sm-6">
                        <form action="{{route('especiales.edit',$item->id)}}" method="get">
                          <i class="far fa-edit"></i>
                          <input type="submit" class="btn btn-warning btn-sm border-dark" value="Editar">
                      </form>
                       </div>       
                      </div>
                    </div>
                  </div> 
                </div>
              </div>
             
              @endforeach
              
            </div>
            
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
     

    </form>
    

    @endsection