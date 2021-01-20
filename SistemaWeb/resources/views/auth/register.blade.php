@extends('layouts.auth')

@section('title')
Registro
@stop


<?php
    $list = [
        0 =>"Alumno",
        1 => "Docente",
        2 => "PAAE"
    ];

    $programas = [
        1 => "Sistemas",
        2 => "Mecatronica",
        3 => "Alimentos",
        4 => "Ambientales",
        5 => "Metalurgia",
    ];
?>
@section('content')
<div class="register-box">
    <div class="register-logo">
      <b>Notipush</b>
    </div>
  
    @if($errors->any())
        @foreach($errors->all() as $err)
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ $err }}
        </div>
        @endforeach
    @endif
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Registre sus datos antes de continuar</p>
  
        {!! Form::open(array('url'=>route('registro'), 'method'=>'post')) !!}
        {!! Form::hidden('boleta', $boleta) !!}
          <div class="input-group mb-3">
            {!! Form::text('nombre', '', ['class'=>'form-control', 'placeholder'=>'Nombre completo']) !!}
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            {!! Form::select('tipo', $list, 0, ['class'=>'custom-select']) !!}
          </div>

          <div class="input-group mb-3">
            {!! Form::select('programa', $programas, 0, ['class'=>'custom-select']) !!}
          </div>
          
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        {!! Form::close() !!}

      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->
@stop