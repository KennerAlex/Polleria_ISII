@extends('layouts.plantilla')
@section('content')
<div style="" class="">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" overflow-hidden shadow-xl sm:rounded-lg">
          <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                  <div class="card" style=" margin-top: 20px">
                        <div class="card-header" style="font-size: 40px">Editar Trabajador Trabajador</div>
                      <div class="card-body">
                        <form action="{{ route('trabajadores.update',['trabajadore'=>$trabajador->id])}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf

                            <div class="row">
                              <div class="form-group col-6" style="width: 250px; height: 250px;">
                                <label for="inputFile" class=" requiredField">
                                    Imagen Preliminar
                                </label>
                                <div class="d-flex justify-content-center">
                                    <div id="loader" class="loader d-none"></div>
                                </div>
                                <div class="text-center">
                                    <img src="{{ $trabajador->urlImagen }}" id="img-src" alt="User Image" class="img-fluid" style="width: 250px; height: 250px; border-radius: 50%">
                                </div>
                              </div>
                              <div class="form-group col-6">
  
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="imagen" name="imagen">
                                    <input type="text" class="custom-file-input d-none" id="imagenUrl" name="imagenUrl">
                                    <label class="custom-file-label" for="imagen" >Elija el archivo</label>
                                </div>
                              </div>
                            </div>
                          <div class="row">
                            <div class="form-group col-4">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $trabajador->nombre }}"  required>
                              </div>
                              <div class="form-group col-4">
                                <label for="apellidoPaterno">Apellido Paterno</label>
                                <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" value="{{ $trabajador->apellidoPaterno}}" required>
                              </div>
                              <div class="form-group col-4">
                                <label for="apellidoMaterno">Apellido Materno</label>
                                <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" value="{{ $trabajador->apellidoMaterno}}" required>
                              </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-4">
                                <label for="estatus">Sexo</label>
                                <select class="form-control" id="sexo" name="sexo" required>
                                  <option value="">Seleccionar</option>
                                  <option value="M" <?php if($trabajador->sexo=='M'){ echo "selected";} ?>>Masculino</option>
                                  <option value="F" <?php if($trabajador->sexo=='F'){ echo "selected";} ?>>Femenino</option>
                                </select>
                            </div>
                            <div class="form-group col-4">
                                <label for="telefono">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $trabajador->direccion}}" required>
                              </div>
                              <div class="form-group col-4">
                                <label for="telefono">DNI</label>
                                <input type="text" class="form-control" id="dni" name="dni" value="{{ $trabajador->dni}}" required>
                            </div>

                          </div>
                          <div class="row">
                            <div class="form-group col-4">
                                <label for="celular">Celular</label>
                                <input type="text" class="form-control" id="celular" name="celular" value="{{ $trabajador->celular}}" required>
                              </div>
                              <div class="form-group col-4">
                                <label for="celular">Telefono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $trabajador->telefono}}" required>
                              </div>
                              <div class="form-group col-4">
                                <label for="celular">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $trabajador->email}}" required>
                              </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-4">
                                <label for="estatus">Estado</label>
                                <select class="form-control" id="estado" name="estado" required>
                                  <option value="">Seleccionar</option>
                                    <option value="1" <?php if($trabajador->activo==1){ echo "selected";} ?>>Activo</option>
                                    <option value="0" <?php if($trabajador->activo==0){ echo "selected";} ?>>Inactivo</option>
                                </select>
                              </div>
                          </div>
                          
                          <button type="submit" class="btn btn-primary">Actualizar</button>
                          <a class="btn btn-danger" href=""{{route('trabajadores.index')}}>Cancelar</a>
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

@section('script')
<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-app.js";        
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries        
  import { getStorage, ref, uploadBytesResumable, getDownloadURL  } from "https://www.gstatic.com/firebasejs/9.9.2/firebase-storage.js"
  // Your web app's Firebase configuration
  const firebaseConfig = {
    apiKey: "AIzaSyA3hIw7o0hOvJjGKGQEsiChTY988otXktM",
    authDomain: "polleria-bd7a4.firebaseapp.com",
    projectId: "polleria-bd7a4",
    storageBucket: "polleria-bd7a4.appspot.com",
    messagingSenderId: "622759355477",
    appId: "1:622759355477:web:888336e0f8ae35aad720dc",
    measurementId: "G-X4TCRG2GMP"
  };;        
  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  // Initialize Cloud Storage and get a reference to the service
  const storage = getStorage(app);

  function updateImage(){
      const file = event.target.files[0];       
      const imagen =  document.getElementById('img-src');
      const fecha = new Date();

      const loader =  document.getElementById('loader');
      const storageRef = ref(storage, 'trabajadores/' + file.name + fecha.getTime());
      const uploadTask = uploadBytesResumable(storageRef, file);
            
      // Listen for state changes, errors, and completion of the upload.
      uploadTask.on('state_changed',
          (snapshot) => {
              loader.classList.remove("d-none");
              imagen.classList.add("d-none");
              const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
              console.log('Upload is ' + progress + '% done');
              switch (snapshot.state) {
                  case 'paused':
                      console.log('Upload is paused');
                  break;
                  case 'running':
                      console.log('Upload is running');
                  break;
              }
          },
          (error) => {
              // A full list of error codes is available at
              // https://firebase.google.com/docs/storage/web/handle-errors
              loader.classList.add("d-none");
              imagen.classList.remove("d-none");
              switch (error.code) {
                  case 'storage/unauthorized':
                      console.log("User doesn't have permission to access the object");
                  break;
                  case 'storage/canceled':
                      console.log('User canceled the upload');
                  break;
                  case 'storage/unknown':
                      console.log('Unknown error occurred, inspect error.serverResponse');
                  break;
              }
          },
          () => {
              // Upload completed successfully, now we can get the download URL
              getDownloadURL(uploadTask.snapshot.ref).then((downloadURL) => {
                  loader.classList.add("d-none");
                  imagen.classList.remove("d-none");
                  console.log('File Updated ', downloadURL);
                  imagen.setAttribute('src',downloadURL); 
                  document.getElementById('imagenUrl').value = downloadURL;


              });
          }
      );
  }

  const imagen = document.getElementById('imagen');
  imagen.addEventListener('change', updateImage)
</script>

@endsection