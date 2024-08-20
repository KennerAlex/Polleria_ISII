@extends('layouts.plantilla')
@section('content')
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
                        <div class="card-header" style="font-size: 40px">Trabajadores</div>
                      <div class="card-body">
                          <div class="form-group">
                              <a href="{{ route('trabajadores.create')}}" class="btn btn-warning"><i class="fas fa-plus"></i> Registrar Nuevo Trabajador</a>
                          </div>
                          <br>
                          <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th>Id</th>
                                  <th>Nombre Completo</th>
                                  <th>Sexo</th>
                                  <th>Direccion</th>
                                  <th>N° Telefono</th>
                                  <th>Email</th>
                                  <th>Estado</th>
                                  <th style="">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($trabajadores as $trabajador) { ?>
                                    <tr>
                                      <td><?php echo $trabajador->id; ?></td>
                                      <td><?php echo $trabajador->nombre;?> <?php echo $trabajador->apellidoPaterno;?> <?php echo $trabajador->apellidoMaterno;?></td>
                                      <td><?php echo $trabajador->sexo; ?></td>
                                      <td><?php echo $trabajador->direccion; ?></td>
                                      <td><?php echo $trabajador->telefono; ?></td>
                                      <td><?php echo $trabajador->email; ?></td>
                                      <td> <?php if($trabajador->activo==1){ echo 'Activo';}else{ echo 'Inactivo';} ?> </td>
                                      <td class="project-actions text-center">
                                        <a class="btn btn-primary btn-sm" href="#">
                                          <i class="fas fa-eye"></i>
                                            Ver
                                        </a>
                                        <a class="btn btn-warning btn-sm" href="{{ route('trabajadores.edit', $trabajador->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Editar
                                        </a>
                                        <br>
                                        <button class="btn btn-danger btn-sm btnEliminar" style="padding-top: 3px" data-id="{{$trabajador->id}}" data-toggle="modal" data-target="#exampleModal">
                                          <i class="fas fa-trash"> </i>
                                          Eliminar
                                        </button>
                                        <form action="{{ route('trabajadores.destroy',$trabajador->id)}}" method="post" id="formEli_{{$trabajador->id}}">
                                          @csrf
                                          <input type="hidden" name="id" value="{{$trabajador->id}}">
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


<!-- Modal Eliminar-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Trabajador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>¿Desea eliminar a este trabajador?</h5>
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