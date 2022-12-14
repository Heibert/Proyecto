@extends('layouts.app')
@vite(['resources/css/app.css'])
@section('title', 'Iniciar Sesión')
 @section('content')
    <link rel="stylesheet" href="{{ url('css/login-auth.css')}}">
    <div class="main-login">

        

        <br><form class="login" id="login" action="" method="POST">
            @csrf
            <h1 class="formulario__titulo">Iniciar Sesión</h1>
            <br>
            <div class="formulario__grupo" id="formulario__correo">
                <label for="Correo" class="formulario__label">Correo electronico</label><br>
                <div class="formulario__grupo-input">
                    <input type="email" class="formulario__input" name="email" id="email" placeholder="Correo" value="{{old('email')}}">
                </div>
            </div>
            <br>

            <div class="formulario__grupo" id="formulario__password">
                <label for="password" class="formulario__label">Contraseña</label><br>
                <div class="formulario__grupo-input">
                    <input type="password" class="formulario__input" name="password" id="password" placeholder="Contraseña">
                </div>
            </div><br>
            @error('message')
            <div class="bg-danger p-3 mb-2">
                <strong class="text-white"> <i class="bi bi-exclamation-circle" style="color: yellow"></i> {{$message}}</strong>
            </div>
            @enderror
            <br>
            <br>
            <div class="formulario__grupo">
                @if (Route::has('password.request'))
                    <div class="formulario__grupo-input">
                        <a href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    </div>
                @endif
            </div>

            <div class="formulario__grupo formulario__grupo-btn-enviar">
                <button type="submit" class="formulario__btn" name="" id="">Ingresar</button>
            </div>
            <div class="formulario__grupo text-center">
                <div class="formulario__grupo-input"><hr class="shadow p-13 mb-15">
                <a href="{{ route('register.index') }}" class="text-black btn btn-outline-primary"><i class="bi bi-person-plus"> Registrarse</i></a>
                </div>
            </div>
        </form>
    </div>
 @endsection