@extends('layouts.auth')

@section('title')
registro
@stop

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="#"> <b>NotiPush</b> </a>
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Inicio de sesión</p>

            <form action="#" method="post">
                <div class="input-group mb-3">
                    <input type="text" placeholder="Numero de boleta o de empleado" class="form-control">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Contraseña">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row ">
                    <!--div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div-->
                    <!-- /.col -->
                    <div class="col-4">
                        <!--button type="submit" class="btn btn-primary btn-block">Entrar</button-->
                        <a href="{{ route('home') }}" class="btn btn-primary">Entrar</a>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
    </div>
</div>
@stop