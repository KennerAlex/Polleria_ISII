<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>DashBoard:Polleria </title>
  <link rel="shortcut icon" href="/adminlte/dist/img/logo_Polleria.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Bitter:ital,wght@1,500;1,600&display=swap');
  </style>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--ribbon -->
  <link rel="stylesheet" href="/adminlte/dist/css/estilos.css">
  <link rel="stylesheet" href="{{asset('css/platos.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
  
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="image.png">

  <!-- Navbar -->
   <nav class="main-header ribbon navbar navbar-expand ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link ribbon" style="color: white" data-widget="pushmenu" href="#" role="button" ><i class="fas fa-bars"></i></a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    

      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
     
    </ul>
  </nav> 
  <!-- /.navbar -->
  

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-warning bg-warning elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link  align-items-center">
      <img src="/adminlte/dist/img/logo_Polleria.png" alt="" class=" img" style="width: 100%; height: 70%;"><br>
      <span class="  font-weight-light">Polleria "El Rico Dí"</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ session('rol')->tipo }} </a>
        </div>
      </div>

      {{-- <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                      <!-- Platos-->
          @if(auth()->user()->idtipousuario == 1 || auth()->user()->idtipousuario == 4)

          @if(auth()->user()->idtipousuario == 1)
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="fa-solid fa-person-chalkboard"></i>
              <p>
                Usuarios/Roles
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/usuarios" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/tipoUsuario" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
        
            

              <!--Registrar Pedidos-->
              <li class="nav-item">
                <a href="{{route('registrar')}}" class="nav-link active">
                  <i class="nav-icon fas fa-marker"></i>
                  <p>
                    Registrar Pedido
                  </p>
                </a>
              </li> 
               <!--Registrar Pedidos-->
               <li class="nav-item">
                <a href="{{route('pedidos.index')}}" class="nav-link active">
                  <i class="nav-icon fas fa-clipboard-list"></i>
                  <p>
                    Mantenedor Pedidos
                  </p>
                </a>
              </li> 
               <!-- Estadisticas-->
            <li class="nav-item">
              <a href="{{route('estadisticas')}}" class="nav-link active">
                <i class="fas fa-chart-bar"></i>
                <p>
                  Estadisticas
                </p>
              </a>
            </li>     

       <!-- Platos-->
          <li class="nav-item">
            <a href="{{route('platos.index')}}" class="nav-link active">
              <i class="nav-icon fas fa-utensils"></i>
              <p>
                Platos
              </p>
            </a>
          </li>

          <!-- REGISTROS Y MANTENEDIRES-->
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="fa-solid fa-folder-open" style="padding-left: 5px"></i>
              <p>
                Registros
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('tipoplato.index')}}" class="nav-link ">
                  <i class="fa-solid fa-bowl-rice"></i>
                  <p>
                    Matenedor Tipo Plato
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('trabajadores.index')}}" class="nav-link ">
                  <i class="fa-solid fa-briefcase"></i>
                  <p>
                    Registro Trabajadores
                  </p>
                </a>
              </li>
            </ul>
          </li>

          @elseif(auth()->user()->idtipousuario == 2 || auth()->user()->idtipousuario == 3)
           <!--Registrar Pedidos-->
           <li class="nav-item">
            <a href="{{route('registrar')}}" class="nav-link active">
              <i class="nav-icon fas fa-marker"></i>
              <p>
                Registrar Pedido
              </p>
            </a>
          </li>
          <!--Registrar Pedidos-->
          <li class="nav-item">
            <a href="{{route('pedidos.index')}}" class="nav-link active">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Mantenedor Pedidos
              </p>
            </a>
          </li> 
          
          @endif
          
            




            <!-- Logout-->
            <li class="nav-item " style="padding-top: 20px">
              <form action="/logout" method="post" style="background: yellow" >
                @csrf
                <a class="nav-link  bg-danger" onclick="this.closest('form').submit()">
                  <i class="fas fa-sign-out-alt"></i>
                  <p>
                   Cerrar Sesión
                  </p>
                </a>
              </form>
            </li>


        

          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Mantenedor
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('polloBrasa.index2')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pollo a la Brasa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/advanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Platos Especiales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/editors.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bebidas</p>
                </a>
              </li>
        
            </ul>
          </li> --}}

         
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content p-2">
    @if(auth()->user()->idtipousuario==1 || auth()->user()->idtipousuario==4)
      @if(auth()->user()->idtipousuario==1)
        @yield('content3')
      @endif
      @yield('content')
      @yield('content2')
    @else
      @yield('content2')
    @endif
     

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer d-none">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="">Polleria: El Rico Di</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/adminlte/dist/js/demo.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

@yield('script')
@yield('calcular')
@yield('grafico')
</body>
</html>
