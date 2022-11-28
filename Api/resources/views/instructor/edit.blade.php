<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Editar instructor</title>
</head>
<body>
    <form action="{{ url('/instructor/'.$instructor->id) }}" method='post' enctype="multipart/form-data"> 
        @csrf
        {{ method_field('PATCH') }}
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
          <a class="nav-link navbar-brand text-back btn btn-outline-white" aria-current="page" href="{{ url('intructor')}}"><i class="bi bi-unindent"> Atras</i></a>
        </li>
    </ul>
    </div>
  </div>
</nav><br>
        <div>
        <section class="d-flex justify-content-center">
    <div class="card col-sm-6 p-3 shadow-lg p-3 mb-5 bg-white rounded ">
        <div class="mb-3">
            <h4 class="text-center">Editar instructor</h4>
        </div>
        <div class="mb-2">
            <form action="">
                <div class="row mb-3 mx-auto">
                <label for="nombreInst"> Nombre del Instructor </label>
                <input class="from-control rounded" placeholder="Escribe aqui" type="text" name="nombreInst" id="nombreInst" value="{{ isset($instructor-> nombreInst)?$instructor-> nombreInst: '' }}">
                @error('nombreInst')
                <div class="bg-danger p-1 mb-2">
                <strong class="text-white"> <i class="bi bi-exclamation-circle" style="color: yellow"></i> {{$message}}</strong>
            </div>
                @enderror
                </div>
                <div class="row mb-3 mx-auto">
                <label for="apellidoInst"> Apellido del Instructor </label>
                <input class="from-control rounded" placeholder="Escribe aqui" type="text" name="apellidoInst" id="apellidoInst" value="{{ isset($instructor-> apellidoInst)?$instructor-> apellidoInst: '' }}">
                @error('apellidoInst')
                <div class="bg-danger p-1 mb-2">
                <strong class="text-white"> <i class="bi bi-exclamation-circle" style="color: yellow"></i> {{$message}}</strong>
            </div>
                @enderror
                </div>
                <div class="row mb-3 mx-auto">
                <label for="tipoDoc"> Tipo de documento </label>
                <select class="from-control rounded" name="tipoDoc" value="{{ isset($instructor-> tipoDoc)?$instructor-> tipoDoc: '' }}">
                    <option value="CC">CC</option>
                </select>
                @error('tipoDoc')
                <div class="bg-danger p-1 mb-2">
                <strong class="text-white"> <i class="bi bi-exclamation-circle" style="color: yellow"></i> {{$message}}</strong>
            </div>
                @enderror
                </div>
                <div class="row mb-3 mx-auto">
                <label for="numDoc"> Número de documento </label>
                <input class="from-control rounded" placeholder="Escribe aqui" type="text" name="numDoc" id="numDoc" value="{{ isset($instructor-> numDoc)?$instructor-> numDoc: '' }}">
                @error('numDoc')
                <div class="bg-danger p-1 mb-2">
                <strong class="text-white"> <i class="bi bi-exclamation-circle" style="color: yellow"></i> {{$message}}</strong>
            </div>
                @enderror
                </div>
                <div class="row mb-3 mx-auto">
                <label for="id_user"> Correo Misena </label>
                    <select class="from-control rounded" name="id_user" id="id_user" value="{{ isset($instructor-> id_user)?$instructor-> id_user: '' }}">
                        @foreach ($user as $u)
                            <option value="{{ $u['id'] }}">
                                {{ $u['email'] }}
                            </option>
                        @endforeach
                    </select>
                    <br>
                    @error('id_user')
                        <div class="bg-danger p-1 mb-2">
                <strong class="text-white"> <i class="bi bi-exclamation-circle" style="color: yellow"></i> {{$message}}</strong>
            </div>
                    @enderror
                </div>
                <div class="row mb-3 mx-auto">
                <label for="telefonoInst"> Telefono </label>
                <input class="from-control rounded" placeholder="Escribe aqui" type="text" name="telefonoInst" id="telefonoInst" value="{{ isset($instructor-> telefonoInst)?$instructor-> telefonoInst: '' }}">
                @error('telefonoInst')
                <div class="bg-danger p-1 mb-2">
                <strong class="text-white"> <i class="bi bi-exclamation-circle" style="color: yellow"></i> {{$message}}</strong>
            </div>
                @enderror
                </div>
                <div class="row mb-3 mx-auto">
                <label for="id_programa"> Programas </label>
                <select class="from-control rounded" name="id_programa" id="id_programa" value="{{ isset($instructor-> id_programa)?$instructor-> id_programa: '' }}">
                    @foreach ($programas as $pa)
                        <option value="{{ $pa['id'] }}">
                            {{ $pa['nombrePrograma'] }}
                        </option>
                    @endforeach
                </select>
                @error('id_programa')
                <div class="bg-danger p-1 mb-2">
                <strong class="text-white"> <i class="bi bi-exclamation-circle" style="color: yellow"></i> {{$message}}</strong>
            </div>
                @enderror
                </div>
                <div class="row mb-3 mx-auto">
                <label for="estado"> Estado </label>
                <select class="from-control rounded" name="estado" value="{{isset($instructor-> estado)?$instructor-> estado: ''}}">
                    <option name="estado" value="Activo">Activo</option>
                    <option name="estado" value="Inactivo">Inactivo</option>
                </select>
                @error('estado')
                <div class="bg-danger p-1 mb-2">
                <strong class="text-white"> <i class="bi bi-exclamation-circle" style="color: yellow"></i> {{$message}}</strong>
            </div>
                @enderror
                </div>
                <div class="row mb-2 mx-auto">
                    <input class="btn btn-primary" type="submit" value="Guardar">
                </div>
            </form>
        </div>
    </div>
</section>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>  

</body>
</html>
