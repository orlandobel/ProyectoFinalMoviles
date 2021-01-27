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
                {!! Form::open(array('url'=>route('enviar'), 'method'=>'post')) !!}
                <div class="modal-body">
                        <div class="form-group">
                            {!! Form::text('titulo', null, ['class'=>'form-control form-control-navbar', 'placeholder'=>'Asunto']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::textarea('descripcion', null, ['class'=>'form-control form-control-navbar', 'placeholder'=>'Descripcion']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::select('grupo', $grupos, 1, ['class'=>'custom-select']) !!}
                            
                        </div>
                    </div>
                    
                <!-- footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                {!! Form::close() !!}
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
                                <div class="col-md-4 col-md-offset-4" id="titulo">Reunión</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"><label for="recipiente-desti"
                                        class="control-label">Destinatarios:</label> </div>
                                <div class="col-md-4 col-md-offset-4" id="grupo">Destinatario</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"><label for="recipiente-Descrip"
                                        class="control-label">Descripcion:</label> </div>
                                <div class="col-md-4 col-md-offset-4" id="descripcion"> Academia de Sistemas </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"><label for="recipiente-Fecha" class="control-label">Fecha:</label>
                                </div>
                                <div class="col-md-4 col-md-offset-4" id="enviado"> 23 de noviembre de 2020 </div>
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
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Grupo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($notificaciones as $notificacion)
                                @if( isset($notificacion->titulo))
                                <tr>
                                    <td>{{ $notificacion->titulo }}</td>
                                    <td>
                                        {{ $notificacion->grupo->nombre }}
                                        </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-success" 
                                                data-toggle="modal" data-target="#m1" 
                                                onclick="abrir({{$notificacion}})">
                                                ver
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
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
<!-- bs-custom-file-input -->
<script src="{{asset('Templates/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script src="{{asset('Templates/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Templates/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Templates/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('Templates/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>$("#example2").DataTable();</script>
<script>
    const titulo = $("#titulo");
    const grupo = $("#grupo");
    const descripcion  = $("#descripcion");
    const enviado = $("#enviado");

    function abrir(notificacion) {
        console.log(notificacion);

        titulo.text(notificacion.titulo);
        grupo.text(notificacion.grupo.nombre);
        descripcion.text(notificacion.descripcion);
        enviado.text(notificacion.created_at);
    }
</script>
@stop
