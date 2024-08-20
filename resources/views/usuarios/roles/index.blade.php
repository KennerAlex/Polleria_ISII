@extends('layouts.plantilla')
@section('content3')
<div style="" class="">
  @if ($message = Session::get('Borrado'))
          <div class="col-12 alert alert-success alert-dismissable fade show" data-dismiss="alert" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h5>Mensaje:</h5>
            <span>{{$message}}</span>
          </div>
  @endif
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
      <div >
        <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-12" style="height: 90vh; overflow:auto">
                <div class="card" style=" margin-top: 20px">
                      <div class="card-header" style="font-size: 40px">Roles</div>
                    <div class="card-body" >
                        <div class="form-group">
                            <a href="{{ route('tipoUsuario.create')}}" class="btn btn-warning"><i class="fas fa-plus"></i> Registrar Nuevo Rol</a>
                        </div>
                        <br>
                        <table class="table table-bordered" >
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Rol</th>
                                <th>Estado</th>
                                <th style="">Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($roles as $rol)
                              
                                  <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$rol->tipo}}</td>
                                    <td> <?php if($rol->activo==1){ echo 'Activo';}else{ echo 'Inactivo';} ?> </td>
                                    <td class="project-actions text-center">
                                      <div class="row">
                                        @if($rol->id != 1 && $rol->id !=2 && $rol->id !=3 && $rol->id !=4)
                                        <div class="col-sm-3">
                                          <a class="btn btn-warning btn-sm" href="{{ route('tipoUsuario.edit', $rol->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Editar
                                          </a>
                                        </div>
                                        <div class="col-sm-3">
                                          <button class="btn btn-danger btn-sm btnEliminar" style="padding-top: 3px" data-id="{{$rol->id}}" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fas fa-trash"> </i>
                                            Eliminar
                                          </button>
                                          <form action="{{ route('tipoUsuario.destroy',$rol->id)}}" method="post" id="formEli_{{$rol->id}}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$rol->id}}">
                                            <input type="hidden" name="_method" value="delete">
                                          </form>
                                        </div>
                                        @else

                                        @endif
                                      </div>
                                      
                                  </td>
                                  </tr>
                                @endforeach  
                            </tbody>
                          </table>
                          <br>
                          <div class="row" style="max-height: 100px">
                            {{-- {{ $noticias->links()}}  --}}
                          </div>    
                    </div>
                  </div>
              </div>
          </div>
      </div>
      </div>
  </div>
</div>


<!-- Modal Eliminar-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>¿Desea eliminar a este rol?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger btnModalEliminar">Eliminar</button>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')

  <script>
    var idEliminar = 0;
    $(document).ready(function(){

      $(".btnEliminar").click(function(){
        idEliminar =$(this).data('id');
        // alert(idEliminar + ' - ' + $(this).data('id'));
      });
      $(".btnModalEliminar").click(function(){
        $("#formEli_"+idEliminar).submit();
      })

    });
  </script>
@endsection