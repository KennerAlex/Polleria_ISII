<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">

</head>
<body>
    <div class="container ">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="{{ route ('identificacion') }}" class="sign-in-form" method="POST">
                    @csrf
                    <h2 class="title">Iniciar Sesión</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" class="form-control @error('usuario') is-invalid @enderror" id="name" name="username" value="admin" required autofocus placeholder="Usuario">
                        @error('name')
                        <span class="invalid-feedback " role="alert">
                            {{$message}}
                        </span>
                        @enderror
                    </div><br>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" class="form-control @error('contraseña') is-invalid @enderror" value="123456" id="password" name="password"  placeholder="Contraseña">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{$message}}
                        </span>  
                        @enderror
                    </div>
                    <input type="submit" value="Login" class="btn solid">
                    <a type="submit" class="" href="http://localhost:4200/">INICIO</a>
                </form>


                <form action="" class="sign-up-form">
                    <h2 class="title">Registrarse</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Nombres">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Apellidos">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" placeholder="Correo">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Usuario">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Contraseña">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-phone-square-alt"></i>
                        <input type="number" placeholder="Telefono">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-street-view"></i>
                        <input type="text" placeholder="Direccion">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-users"></i>
                        <input type="text" placeholder="Tipo de Usuario">
                    </div>
                    <input type="submit" value="Registrar" class="btn solid">
                </form>
            </div>

        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>¿Nuevo Aqui?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum consequuntur blanditiis aliquid?</p>
                    <button class="btn transparent" id="sign-up-btn">Registrate!</button>
                </div>
                <img src="/adminlte/dist/img/logo_Polleria.png" alt="" class="image">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Eres cliente?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum consequuntur blanditiis aliquid?</p>
                    <button class="btn transparent" id="sign-in-btn">Atras</button>
                </div>
                <img src="/adminlte/dist/img/logo_Polleria.png" alt="" class="image">
            </div>
        </div>
    </div>  
    <script src="{{asset('js/login.js')}}"></script>   
</body>
</html>