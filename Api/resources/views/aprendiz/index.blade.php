<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Aprendices</title>
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
          <a class="nav-link navbar-brand text-back btn btn-outline-white" aria-current="page" href="{{ url('aprendiz/create') }}"><i class="bi bi-plus-lg"> Crear</i></a>
        </li>
        @if(auth()->user()->rol == 'admin')
        <li class="nav-item">
          <a class="nav-link navbar-brand text-back btn btn-outline-white" aria-current="page" href="{{ url('admin') }}"><i class="bi bi-unindent"> Atras</i></a>
        </li>
        @elseif(auth()->user()->rol == 'instructor')
        <li class="nav-item">
          <a class="nav-link navbar-brand text-back btn btn-outline-white" aria-current="page" href="{{ url('instructorSesion') }}"><i class="bi bi-unindent"> Atras</i></a>
        </li>
        @else(auth()->user()->rol == '')
        <li class="nav-item">
          <a class="nav-link navbar-brand text-back btn btn-outline-white" aria-current="page" href="{{ url('index') }}"><i class="bi bi-unindent"> Atras</i></a>
        </li>
        @endif
    </ul>
    </div>
  </div>
</nav>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Tipo de documento</th>
                <th>Número de documento</th>
                <th>Correo Misena</th>
                <th>Correo Personal</th>
                <th>Telefono</th>
                <th>Ficha</th>
                <th>Estado</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>

        <tbody>
            @foreach($aprendiz as $a)
            <tr>
                <td>{{ $a->id }}</td>
                <td>{{ $a->nombreAprend}} </td>
                <td>{{ $a->apelliAprend}}</td>
                <td>{{ $a->tipoDoc}}</td>
                <td>{{ $a->numDoc}}</td>
                <td>{{ $a->correoMisena}}</td>
                <td>{{ $a->correoAprend}}</td>
                <td>{{ $a->telefonoAprend}}</td>
                <td>{{ $a->fichas->numFicha}}</td>
                <td>{{ $a->estado}}</td>
                <td>
                    <a href="{{url('/aprendiz/'.$a->id.'/edit')}}">
                        <button class="btn btn-outline-warning">Editar</button>
                    </a> 
                </td>
                <br>
                <td>
                    <form action="{{url('/aprendiz/'.$a->id)}}" method="post">
                        @csrf
                        {{method_field('DELETE')}}
                        <button class="btn btn-outline-danger" type="submit" onclick="return confirm('¿Quieres Eliminar?')" value="Eliminar"> Eliminar </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>  

</body>
</html>

