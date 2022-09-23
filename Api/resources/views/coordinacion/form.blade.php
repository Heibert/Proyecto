<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/login.css')}}">
    @vite(['resources/css/app.css'])
    <title>Crear coordinacion</title>
</head>
<body>
<nav class="navbar text-uppercase navbar-expand-md  bg-dark">
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
          <a class="nav-link navbar-brand text-white " aria-current="page" href="{{ url('coordinacion')}}"><i class="bi bi-unindent"> Atras</i></a>
        </li>
    </ul>
    </div>
  </div>
</nav>
        <center>
        <div class="border border-dark w-50 opacity-75" style="background-color: orangered ;">
        <form><br>
        @error('nomCoordinacion')
                <small>{{$message}}</small>
        @enderror
        <div class="input-group mb-3 w-50">
  <div class="input-group-prepend">
    <label class="input-group-text" for="nomCoordinacion">Coordinacion</label>
  </div>
  <input type="text" class="form-control" aria-label="Escriba Aqui" aria-describedby="basic-addon1" name="nomCoordinacion" id="nomCoordinacion" value="{{ isset($coordinacion-> nomCoordinacion)?$coordinacion-> nomCoordinacion: '' }}">
</div>
                <div>
            <button type="submit" class="btn btn-primary" value="Guardar">Crear</button>
        </div><br>
            </center>
        </div>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>  

</body>
</html>