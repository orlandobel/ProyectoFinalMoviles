import 'dart:io';

import 'package:NotiPush/controllers/auth_controller.dart';
import 'package:NotiPush/controllers/notificaciones_controller.dart';
import 'package:NotiPush/models/notificacion.dart';
import 'package:NotiPush/models/usuario.dart';
import 'package:NotiPush/views/drawer.dart';
import 'package:NotiPush/views/notificaciones/elemento_lista.dart';
import 'package:firebase_messaging/firebase_messaging.dart';
import 'package:flutter/material.dart';
import 'package:fluttertoast/fluttertoast.dart';

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
  FirebaseMessaging _fcm = FirebaseMessaging();
  String _token;

  @override
  void initState() {
    super.initState();
    this._configureFCM().then((value) {
      this._buscarNotificaciones();
    });
  }

  Future _configureFCM() async {
    if (Platform.isIOS) {
      _fcm.requestNotificationPermissions(IosNotificationSettings());
    }

    _fcm.configure(
      onMessage: (Map<String, dynamic> message) async {
        print('onMessage: $message');
        final not = message['notification'];

        final titulo = not['title'];

        this._buscarNotificaciones();

        Fluttertoast.showToast(
          msg: "Nueva notificacion: $titulo",
          gravity: ToastGravity.CENTER,
          toastLength: Toast.LENGTH_SHORT,
          timeInSecForIosWeb: 2,
          fontSize: 16,
        );
      },
      onLaunch: (Map<String, dynamic> message) async {
        print('onLaunt: $message');
      },
      onResume: (Map<String, dynamic> message) async {
        print('onResume: $message');
      },
    );

    _token = await _fcm.getToken();
    print('token: $_token');
    await AuthController.updateToken(_token, widget.usuario.id, false);
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
