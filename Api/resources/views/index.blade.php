<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cherpro</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="{{ url('css/tarjeta.css')}}">
</head>
<body>
<nav class="navbar text-uppercase navbar-expand-md shadow p-13 mb-15 bg-body rounded bg-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="">
        <img src="{{ url('img/logo.png')}}" class="d-inline-block align-top" alt="logo">
    </a>
    <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      
      <ul class="navbar-nav navbar-right ms-auto  mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link navbar-brand text-back btn btn-outline-white " aria-current="page" href="{{ route('login.destroy') }}"><i class="bi bi-box-arrow-left"> Cerra Sesión</i></a>
        </li>
    </ul>
    </div>
  </div>
</nav>
  <main>
  @if(auth()->user()->rol == 'admin')
  <div class="container">
        <li class="card">
          <div class="contenido">
            <h3>COORDINACIÓN</h3>
            <a href="{{ url('coordinacion')}}">Coordinación</a>
          </div>
        </li>

        <li class="card">
          <div class="contenido">
            <h3>FICHA</h3>
            <a href="{{ url('ficha')}}">Ficha</a>
          </div>
        </li>

        <li class="card">
          <div class="contenido">
            <h3>APRENDIZ</h3>
            <a href="{{ url('aprendiz')}}">Aprendiz</a>
          </div>
        </li>

        <li class="card">
          <div class="contenido">
            <h3>INSTRUCTOR</h3>
            <a href="{{ url('instructor')}}">Instructor</a>
          </div>
        </li>
        <li class="card">
          <div class="contenido">
              <h3>COORDINADOR</h3>
                <a href="{{ url('coordinador')}}">Coordinador</a>
          </div>
        </li>

        <li class="card">
          <div class="contenido">
            <h3>EXCUSA</h3>
              <a href="{{ url('excusa')}}">Excusa</a>
          </div>
        </li>

        <li class="card">
          <div class="contenido">
            <h3>PROGRAMA</h3>
              <a href="{{ url('programa')}}">Programa</a>
          </div>  
        </li>

        <li class="card">
          <div class="contenido">
            <h3>REPORTE</h3>
            <a href="{{ url('reporte')}}">Reporte</a>
          </div>         
        </li>

        <li class="card">
          <div class="contenido">
            <h3>TEMÁTICA</h3>
              <a href="{{ url('tematica')}}">Temática</a>
          </div>
        </li>

        <li class="card">
          <div class="contenido">
            <h3>TRIMESTRE</h3>
              <a href="{{ url('trimestre')}}">Trimestre</a>
          </div>
        </li>

        <li class="card">
          <div class="contenido">
            <h3>ADMINISTRADOR</h3>
              <a href="{{ url('administrador')}}">Administrador</a>
          </div>
        </li>

        <li class="card">
          <div class="contenido">
            <h3>ASISTENCIA</h3>
              <a href="{{ url('http://localhost:3000')}}">Asistencia</a>
          </div>
        </li>
        <li class="card">
          <div class="contenido">
            <h3>USUARIOS</h3>
              <a href="{{ url('user')}}">Usuarios</a>
          </div>
        </li>
    </div>
  @elseif(auth()->user()->rol == 'instructor')
  <div class="container">
    <li class="card">
      <div class="contenido">
        <h3>EXCUSA</h3>
          <a href="{{ url('excusa')}}">Excusa</a>
      </div>
    </li>

    <li class="card">
      <div class="contenido">
        <h3>PROGRAMA</h3>
          <a href="{{ url('programa')}}">Programa</a>
      </div>  
    </li>

    <li class="card">
      <div class="contenido">
        <h3>REPORTE</h3>
        <a href="{{ url('reporte')}}">Reporte</a>
      </div>         
    </li>

    <li class="card">
      <div class="contenido">
        <h3>TEMÁTICA</h3>
          <a href="{{ url('tematica')}}">Temática</a>
      </div>
    </li>

    <li class="card">
      <div class="contenido">
        <h3>TRIMESTRE</h3>
          <a href="{{ url('trimestre')}}">Trimestre</a>
      </div>
    </li>

    <li class="card">
      <div class="contenido">
        <h3>FICHA</h3>
        <a href="{{ url('ficha')}}">Ficha</a>
      </div>
    </li>

    <li class="card">
      <div class="contenido">
        <h3>APRENDIZ</h3>
        <a href="{{ url('aprendiz')}}">Aprendiz</a>
      </div>
    </li>

    <li class="card">
      <div class="contenido">
        <h3>ASISTENCIA</h3>
          <a href="{{ url('http://localhost:3000')}}">Asistencia</a>
      </div>
    </li>
  </div>
  @else(auth()->user()->rol == '')
  <div class="container">
        <li class="card">
          <div class="contenido">
            <h3>EXCUSA</h3>
              <a href="{{ url('excusa')}}">Excusa</a>
          </div>
        </li>

        <li class="card">
          <div class="contenido">
            <h3>PROGRAMA</h3>
              <a href="{{ url('programa')}}">Programa</a>
          </div>  
        </li>

        <li class="card">
          <div class="contenido">
            <h3>TEMÁTICA</h3>
              <a href="{{ url('tematica')}}">Temática</a>
          </div>
        </li>

        <li class="card">
          <div class="contenido">
            <h3>TRIMESTRE</h3>
              <a href="{{ url('trimestre')}}">Trimestre</a>
          </div>
        </li>

    </div>
  @endif
    
  </main>  

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>  
</body>
</html>