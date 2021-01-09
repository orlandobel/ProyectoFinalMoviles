@extends('layouts.app')

@section('css')
@stop

@section('title')
    Notificacion
@stop

@section('modals')
    <!-- Modal nueva notificacion -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Nueva notificación</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <input class="form-control form-control-navbar" type="text" placeholder="Asunto"
                                aria-label="Search">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control form-control-navbar" placeholder="Descripcion"
                                aria-label="Descripcion" id="message-text"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="true">
                                Seleccionar grupo
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="#">3cm4</a>
                                <a class="dropdown-item" href="#">4cm1</a>
                                <a class="dropdown-item" href="#">2cm2</a>
                                <a class="dropdown-item" href="#">Graduado</a>
                                <div class="dropdown-divider"></div>

                            </div>
                        </div>
                    </form>
                </div>

                <!-- footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
	</div>
	<!-- Modal nueva notificacion end -->

    <!-- Modal ver 1 -->
    <div class="modal fade" id="m1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Notificación</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"><label for="recipient-name" class="control-label">Asunto:</label>
                                </div>
                                <div class="col-md-4 col-md-offset-4">Reunión</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"><label for="recipiente-desti"
                                        class="control-label">Destinatarios:</label> </div>
                                <div class="col-md-4 col-md-offset-4">Destinatario</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"><label for="recipiente-Descrip"
                                        class="control-label">Descripcion:</label> </div>
                                <div class="col-md-4 col-md-offset-4"> Academia de Sistemas </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"><label for="recipiente-Fecha" class="control-label">Fecha:</label>
                                </div>
                                <div class="col-md-4 col-md-offset-4"> 23 de noviembre de 2020 </div>
                            </div>
                        </div>

                    </form>
                </div>

                <!-- footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal ver 1 end -->
@stop

@section('content')
    <div class="content">
        <!-- Content Header (Page header)  Contenedor del titulo de la pagina-->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Notificaciones</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Principal</a></li>
                            <li class="breadcrumb-item active">Notificaciones</li>
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
                        <div class="col-md-11">
                            <h3 class="card-title">Grupos</h3>
                        </div>
                        <div class="col-md-1">
                            <!-- Modal nueva notificacion -->
                            <button type="button" class="btn btn-block bg-gradient-success btn-sm" data-toggle="modal"
                                data-target="#myModal"> Nueva </button>
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
                                            <a href="#m1" data-toggle="modal">Ver</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Credenciales</td>
                                    <td>Para nuevo Ingreso</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#m1" data-toggle="modal">Ver</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>BEIFI</td>
                                    <td>Para Becas BEIFI</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#m1" data-toggle="modal">Ver</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Delfin</td>
                                    <td>Grupo Delfin</td>
                                    <td>
                                        <div class="btn-group-vertical">
                                            <a href="#m1" data-toggle="modal">Ver</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>

@stop

@section('js')
@stop
