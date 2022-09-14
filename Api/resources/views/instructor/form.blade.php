<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Crear instructor</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('instructor') }}">Inicio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('instructor/create') }}"> Crear </a>
            </li>
        </div>
    </nav>
    <br>
    <div>
        <center>
        <div>
            <label for="nombreInst"> Nombre del Instructor </label>
            <div>
                <input type="text" name="nombreInst" id="nombreInst" value="{{ isset($instructor-> nombreInst)?$instructor-> nombreInst: '' }}">
            </div>
            @error('nombreInst')
                <small>{{$message}}</small>
            @enderror
        </div>
        <br>
        <div>
            <label for="apellidoInst"> Apellido del Instructor </label>
            <div>
                <input type="text" name="apellidoInst" id="apellidoInst" value="{{ isset($instructor-> apellidoInst)?$instructor-> apellidoInst: '' }}">
            </div>
            @error('apellidoInst')
                <small>{{$message}}</small>
            @enderror
        </div>
        <br>
        <div>
            <label for="tipoDoc"> Tipo de documento </label>
            <div>
                <input type="text" name="tipoDoc" id="tipoDoc" value="{{ isset($instructor-> tipoDoc)?$instructor-> tipoDoc: '' }}">
            </div>
            @error('tipoDoc')
                <small>{{$message}}</small>
            @enderror
        </div>
        <br>
        <div>
            <label for="numDoc"> Número de documento </label>
            <div>
                <input type="number" name="numDoc" id="numDoc" value="{{ isset($instructor-> numDoc)?$instructor-> numDoc: '' }}">
            </div>
            @error('numDoc')
                <small>{{$message}}</small>
            @enderror
        </div>
        <br>
        <div>
            <label for="correoMisena"> Correo Misena </label>
            <div>
                <input type="text" name="correoMisena" id="correoMisena" value="{{ isset($instructor-> correoMisena)?$instructor-> correoMisena: '' }}">
            </div>
            @error('correoMisena')
                <small>{{$message}}</small>
            @enderror
        </div>
        <br>
        <div>
            <label for="telefonoInst"> Telefono </label>
            <div>
                <input type="text" name="telefonoInst" id="telefonoInst" value="{{ isset($instructor-> telefonoInst)?$instructor-> telefonoInst: '' }}">
            </div>
            @error('telefonoInst')
                <small>{{$message}}</small>
            @enderror
        </div>
        <br>
        <div>
            <label for="id_programa"> Programas </label>
            <div>
                <select name="id_programa" id="id_programa" value="{{ isset($instructor-> id_programa)?$instructor-> id_programa: '' }}">
                    @foreach ($programas as $pa)
                        <option value="{{ $pa['id'] }}">
                            {{ $pa['nombrePrograma'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('id_programa')
                <small>{{$message}}</small>
            @enderror
        </div>
        <br>
        <div>
            <input type="submit" value="Guardar">
        </div>
        </center>
    </div>
</body>
</html>






