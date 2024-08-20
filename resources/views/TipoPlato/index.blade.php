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
                        <div class="card-header" style="font-size: 40px">Tipos de Platos</div>
                      <div class="card-body">
                          <div class="form-group">
                              <a href="{{ route('tipoplato.create')}}" class="btn btn-warning"><i class="fas fa-plus"></i> Registrar Nuevo Tipo de Plato</a>
                          </div>
                          <br>
                          <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th>Id</th>
                                  <th>Descripcion</th>
                                  <th>Estado</th>
                                  <th style="">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($tipos as $tipo) { ?>
                                    <tr>
                                      <td><?php echo $tipo->id; ?></td>
                                      <td><?php echo $tipo->descripcion; ?></td>
                                      <td> <?php if($tipo->activo==1){ echo 'Activo';}else{ echo 'Inactivo';} ?> </td>
                                      <td class="project-actions text-center">
                                        <a class="btn btn-primary btn-sm" href="#">
                                          <i class="fas fa-eye"></i>
                                            Ver
                                        </a>
                                        <a class="btn btn-warning btn-sm" href="{{ route('tipoplato.edit', $tipo->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Editar
                                        </a>
                                        <button class="btn btn-danger btn-sm btnEliminar" data-id="{{$tipo->id}}" data-toggle="modal" data-target="#exampleModal">
                                          <i class="fas fa-trash"> </i>
                                          Eliminar
                                        </button>
                                        <form action="{{ route('tipoplato.destroy',$tipo->id)}}" method="post" id="formEli_{{$tipo->id}}">
                                          @csrf
                                          <input type="hidden" name="id" value="{{$tipo->id}}">
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
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Tipo de Plato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>Desea eliminar este tipo de plato</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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