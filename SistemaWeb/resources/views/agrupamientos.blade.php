@extends('layouts.app')

@section('css')
@stop

@section('title')
Agrupamientos
@stop

@section('modals')
<!-- Modal nuevo agrupamiento -->
<div class="modal fade" id="nuevoModal" tabindex="-1" role="dialog" aria-labelledby="nuevoModalLabel">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="nuevoModalLabel">Nuevo agrupamiento</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                      aria-hidden="true">&times;</span></button>

          </div>
          <div class="modal-body">
              <form>
                  <div class="form-group">
                      <input class="form-control form-control-navbar" type="text" placeholder="Nombre"
                          aria-label="Search">
                  </div>

                  <div class="form-group">
                      <textarea class="form-control form-control-navbar" placeholder="Descripcion"
                          aria-label="Descripcion" id="message-text"></textarea>
                  </div>
              </form>
          </div>

          <!-- footer -->
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary">Guardar</button>
          </div>
      </div>
  </div>
</div>

<!-- Modal nuevo agrupamiento -->
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
                <tr>
                  <td>Ada Lovelace</td>
                  <td>Alumno</td>
                  <td>
                    <button type="button" class="btn btn-info">
                      <i class="far fa-dot-circle"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Grace Hopper</td>
                  <td>PAAE</td>
                  <td>
                    <button type="button" class="btn btn-info">
                      <i class="far fa-dot-circle"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Margaret Hamilton</td>
                  <td>Alumno</td>
                  <td>
                    <button type="button" class="btn btn-info">
                      <i class="far fa-dot-circle"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Joan Clarke</td>
                  <td>Docente</td>
                  <td>
                    <button type="button" class="btn btn-info">
                      <i class="far fa-dot-circle"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-md-3">
              <select class="form-control">
                <option>Seleccione un grupo</option>
                <option>Becas</option>
                <option>Credenciales</option>
                <option>BEIFI</option>
                <option>Delfin</option>
              </select>
            </div>
            <div class="col-md-7"></div>
            <div class="col-md-2">
              <button type="button" class="btn btn-block btn-success btn-lg">Asignar</button>
            </div>
            <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Función</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Ada Lovelace</td>
                  <td>Alumno</td>
                  <td>
                    <button type="button" class="btn btn-danger">
                      <i class="far fa-dot-circle"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Grace Hopper</td>
                  <td>Docente</td>
                  <td>
                    <button type="button" class="btn btn-danger">
                      <i class="far fa-dot-circle"></i>
                    </button>
                  </td>
                </tr>
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
@stop