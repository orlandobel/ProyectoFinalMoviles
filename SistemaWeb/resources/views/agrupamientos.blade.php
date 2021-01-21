<?php
  foreach($grupos as $g) {
    foreach($g->miembros as $miembro) {
      $miembro->usuario;
    }
  }
?>

@extends('layouts.app')

@section('css')
@stop

@section('title')
Agrupamientos
@stop

@section('modals')
<!-- Modal nuevo grupo -->
<div class="modal fade" id="nuevoModal" tabindex="-1" role="dialog" aria-labelledby="nuevoModalLabel">
    {!!Form::open(array('url'=>route('creando'), 'id'=>'add_grupo',
    'method'=>'POST'))!!}
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="nuevoModalLabel">Nuevo grupo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                      aria-hidden="true">&times;</span></button>

          </div>
          <div class="modal-body">
              <form>
                  <div class="form-group">
                    {!!Form::text('nombre', null,
                    ['class'=>'form-control form-control-navbar',
                    'placeholder'=>'Nombre del Grupo',
                    'id'=>'nombre'])!!}
                  </div>

                  <div class="form-group">
                    {!!Form::textarea('descripcion', null,
                    ['class'=>'form-control form-control-navbar',
                    'placeholder'=>"Descripcion",
                    'id'=>'descripcion'])!!}
                  </div>
              </form>
          </div>

          <!-- footer -->
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
      </div>
      {!!Form::close()!!}
  </div>
</div>
<!-- Fin modal nuevo grupo -->

<!-- Modal editar grupo -->
<div class="modal fade" id="editarGrupo" tabindex="-1" role="dialog" aria-labelledby="nuevoModalLabel">
  <div class="modal-dialog" role="document">
    {!!Form::open(array('url'=>route('actualizar'), 'id'=>'add_grupo', 'method'=>'PUT'))!!}
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="nuevoModalLabel">Editar grupo</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          {!! Form::hidden("id_editar", null, ['id'=>'id_editar']) !!}
          <div class="modal-body">  
            <div class="form-group">
              {!!Form::text('nombre_editar', null, ['class'=>'form-control form-control-navbar',
                'placeholder'=>'Nombre del Grupo',
                'id'=>'nombre_editar'])!!}
            </div>

            <div class="form-group">
              {!!Form::textarea('descripcion_editar', null, ['class'=>'form-control form-control-navbar',
                'placeholder'=>"Descripcion",
                'id'=>'descripcion_editar'])!!}
            </div>
        
          </div>

          <!-- footer -->
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
      </div>
    {!!Form::close()!!}
  </div>
</div>
<!-- Fin modal editar grupo -->
@stop

@section('content')

<div class="content">
    <!-- Content Header (Page header)  Contenedor del titulo de la pagina-->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agrupamientos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Principal</a></li>
              <li class="breadcrumb-item active">Agrupamientos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      @if($errors->any())
                @foreach($errors->all() as $err)
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ $err }}
                </div>
                @endforeach    
            @endif
      <!-- Grupos -->
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11"><h3 class="card-title">Grupos</h3></div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-block btn-success btn-xs"
                    data-toggle="modal", data-target="#nuevoModal">
                        <i class="fas fa-plus-circle"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Descripcion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($grupos as $grupo)
                      <tr>
                            <td>{{$grupo->nombre}}</td>
                            <td>{{$grupo->descripcion}}</td>
                            <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info" 
                                  data-target="#editarGrupo" data-toggle="modal" onclick="mostrarEditar({{$grupo}});">
                                    <i class="fas fa-pen-alt"></i>
                                </button>

                                {!!Form::open(array('url'=>'/grupo/delete/'.$grupo->id,
                                                    'method'=>'delete'))!!}
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-ban"></i>
                                </button>
                                {!!Form::close()!!}
                            </div>
                            </td>
                        </tr>

                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Asignar a Grupo</h3>
        </div>

        <div class="card-body">
          <div class="card-tools">
          <div class="row">
            <div class="col-md-10"></div>

            <div class="col-md-2">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
              </div>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Nombres</th>
                  <th>Función</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($usuarios as $u)
                <tr>
                  <td> {{$u -> nombre}} </td>
                    <td>
                      @if($u -> tipo == 0)
                        Alumno
                      @elseif ($u -> tipo == 1)
                        Docente
                      @elseif ($u -> tipo == 2)
                        PAAE
                      @endif
                    </td>
                  <td>
                    <button type="button" class="btn btn-info">
                      <i class="far fa-dot-circle"></i>
                    </button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-md-3">
              <button type="button" class="btn btn-default dropdown-toggle" 
                data-toggle="dropdown" id="selector">
                Seleccione un grupo
              </button>

              <ul class="dropdown-menu">
                @foreach($grupos as $grupo)
                <li class="dropdown-item">
                  <a href="javascript:cambiarGrupo({{$grupo->miembros}}, '{{$grupo->nombre}}');">{{$grupo->nombre}}</a></li>
                @endforeach
              </ul>
            </div>

            <div class="col-md-7"></div>

            <div class="col-md-2">
              <button type="button" class="btn btn-block btn-success">Asignar</button>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="table-responsive">
            <table class="table table-bordered" >
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Función</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody id="miembrosGrupo">
                
              </tbody>
            </table>
          </div>
        <!-- /.card-body -->
        <div class="card-footer">
              <button type="button" class="btn btn-block btn-secondary">Secondary</button>
        </div>
        <!-- /.card-footer-->
        </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@stop

@section('js')
<script src="{{ asset('Custom/js/grupos.js') }}"></script>
@stop
