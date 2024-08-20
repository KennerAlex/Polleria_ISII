@extends('layouts.plantilla')
@section('content')
     <!-- REBOON separador-->
   <div class="row ">
    {{-- <div id="separator-ribbon" class="justify-content-center">
      <div class="content" style="background-color: yellow;">  --}}
        {{-- <div class="row justify-content-center"> --}}
          <h1 style="font-family: serif; font-size: 30pt; font-size-adjust: 1.2 d-no d-md-block ; text-decoration: underline; font-weight: bolder;">Menú</h1>
        {{-- </div>    
      </div>
    </div> --}}
   </div>
 
    <form >
      
      <div class="row">
        <div class="col-10 d-none d-lg-block"></div>
        <div class="col-5 col-sm-2">
          <input type="submit" class="btn btn-warning border-dark" value="Agregar nuevo plato">
        </div>
      </div>
      <br>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Menu</h3>
  
            </div>
            <!-- /.card-header -->
            <div class="card-columns"> 
              @foreach ($menus as $item)
              <div class="row">
                <div class="col-4" >
                  <div class="card" style="width: 20rem;height: 35rem; margin-left: 20px; margin-top: 10px">
                    <img src="{{$item->img}}" class="card-img-top imagenes" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$item->nombre}}</h5>
                      <p class="card-text">{{$item->descripcion}}</p>
                      <p class="card-text">{{$item->precio}}</p>
                      <div class="row">
                        <div class="col col-sm-5">
                          <form method="get" action="{{route('registrar',$item->id)}}"> 

                            <input type="submit" class="btn btn-warning btn-sm border-dark"  value="Registrar Pedido">   
                        </form>
                        </div>
                       <div class="col col-sm-1"></div>
                          
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