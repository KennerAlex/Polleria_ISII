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
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" overflow-hidden shadow-xl sm:rounded-lg">
          <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                  <div class="card" style=" margin-top: 20px">
                        <div class="card-header" style="font-size: 40px">Usuarios</div>
                      <div class="card-body">
                          <div class="form-group">
                              <a data-toggle="modal" data-target="#modalRegistrar" class="btn btn-warning"><i class="fas fa-plus"></i> Registrar Nuevo usuario</a>
                          </div>
                          <br>
                          <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th>Usuario</th>
                                  <th>Nombre Completo</th>
                                  <th>Estado</th>
                                  <th>Tipo/Rol</th>
                                  <th style="">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($usuarios as $usuario) { ?>
                                    <tr>
                                      <td><?php echo $usuario->username;?></td>
                                      <td><?php echo $usuario->nombre;?></td>
                                      <td> <?php if($usuario->activo==1){ echo 'Activo';}else{ echo 'Inactivo';} ?> </td>
                                      <td><?php echo $usuario->tipo; ?></td>
                                      <td class="project-actions text-center">
                                        <br>
                                        <button class="btn btn-danger btn-sm btnEliminar" style="padding-top: 3px" data-id="{{$usuario->id}}" data-toggle="modal" data-target="#exampleModal">
                                          <i class="fas fa-trash"> </i>
                                          Eliminar
                                        </button>
                                        <form action="{{ route('usuarios.destroy',$usuario->id)}}" method="post" id="formEli_{{$usuario->id}}">
                                          @csrf
                                          <input type="hidden" name="id" value="{{$usuario->id}}">
                                          <input type="hidden" name="_method" value="delete">
                                        </form>
                                        
                                    </td>
                                    </tr>
                                <?php } ?>
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
<!-- Modal Registrar-->
<div class="modal fade" id="modalRegistrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('usuarios.store')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
                
                <div class="row">
                  <div class="form-group col-6">
                      <label for="trabajador">Trabajador</label>
                      <select class="form-control" id="idtrabajador" name="idtrabajador" required>
                        <option value="">Seleccionar</option>
                          <?php foreach ($trabajadores as $trabajador) { ?>
                              <option value="<?php echo $trabajador->id; ?>"><?php echo $trabajador->nombre; ?> <?php echo $trabajador->apellidoPaterno; ?></option>
                          <?php } ?>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label for="rol">Rol</label>
                      <select class="form-control" id="idrol" name="idrol" required>
                        <option value="">Seleccionar</option>
                          <?php foreach ($tipos as $tipo) { ?>
                              <option value="<?php echo $tipo->id; ?>"><?php echo $tipo->tipo; ?></option>
                          <?php } ?>
                      </select>
                    </div>
                    
                </div>
                <div class="row">
                  <div class="form-group col-6">
                      <label for="estatus">Usuario</label>
                      <input type="text" class="form-control" id="usuario" name="usuario" required>
                  </div>
                  <div class="form-group col-6">
                      <label for="telefono">Contraseña</label>
                      <input type="text" class="form-control" id="contrasena" name="contrasena" required>
                    </div>

                </div>         
        </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a class="btn btn-danger" data-dismiss="modal">Cancelar</a>
            </div>
    </form>
      </div>
    </div>
  </div>

<!-- Modal Eliminar-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>¿Desea eliminar a este usuario?</h5>
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