import 'package:NotiPush/controllers/notificaciones_controller.dart';
import 'package:NotiPush/models/notificacion.dart';
import 'package:NotiPush/models/usuario.dart';
import 'package:NotiPush/views/drawer.dart';
import 'package:NotiPush/views/notificaciones/elemento_lista.dart';
import 'package:flutter/material.dart';

class Notificaciones extends StatefulWidget {
  final Usuario usuario;

  Notificaciones({
    @required this.usuario,
    Key key,
  }) : super(key: key);

  @override
  _NotificacionesState createState() => _NotificacionesState();
}

class _NotificacionesState extends State<Notificaciones> {
  List<Notificacion> _notificaciones = List();
  ListView _lista;

  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    this._buscarNotificaciones();
  }

  void _buscarNotificaciones() {
    NotificacionesController.getNotificaciones(widget.usuario.id).then(
      (respuesta) {
        setState(() {
          this._notificaciones = respuesta;
        });
      },
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("NotuPushUPIIZ | Notificaciones"),
      ),
      drawer: DrawerMenu(),
      body: Container(
        padding: EdgeInsets.only(top: 10),
        child: (_notificaciones.length == 0)
            ? Center(
                child: Text('No se han encontrado notificaciones'),
              )
            : ListView.builder(
                itemCount: this._notificaciones.length,
                itemBuilder: (context, index) {
                  Notificacion notificacion = _notificaciones[index];
                  return Elemento(notificacion: notificacion);
                },
              ),
      ),
    );
  }
}
