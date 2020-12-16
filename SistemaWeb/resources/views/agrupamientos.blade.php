@extends('layouts.app')

@section('css')
@stop

@section('title')
Agrupamientos
@stop

@section('modals')
@stop

@section('content')
<div class="content">
    <!-- Content Header (Page header)  Contenedor del titulo de la pagina-->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
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

      <!-- Grupos -->
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11"><h3 class="card-title">Grupos</h3></div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-block btn-success btn-xs">
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
                        <tr>
                            <td>Becas</td>
                            <td>Para Becas</td>
                            <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info">
                                    <i class="fas fa-pen-alt"></i>
                                </button>
                                <button type="button" class="btn btn-danger">
                                    <i class="fas fa-ban"></i>
                                </button>
                            
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Credenciales</td>
                            <td>Para nuevo Ingreso</td>
                            <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info">
                                    <i class="fas fa-pen-alt"></i>
                                </button>
                                <button type="button" class="btn btn-danger">
                                    <i class="fas fa-ban"></i>
                                </button>
                            
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>BEIFI</td>
                            <td>Para Becas BEIFI</td>
                            <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info">
                                    <i class="fas fa-pen-alt"></i>
                                </button>
                                <button type="button" class="btn btn-danger">
                                    <i class="fas fa-ban"></i>
                                </button>
                            
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Delfin</td>
                            <td>Grupo Delfin</td>
                            <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info">
                                    <i class="fas fa-pen-alt"></i>
                                </button>
                                <button type="button" class="btn btn-danger">
                                    <i class="fas fa-ban"></i>
                                </button>
                            
                            </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          Start creating your amazing application!
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@stop

@section('js')
@stop