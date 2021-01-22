import 'package:NotiPush/models/notificacion.dart';
import 'package:flutter/material.dart';

class Detalles extends StatelessWidget {
  final Notificacion notificacion;

  Detalles({
    @required this.notificacion,
    Key key,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("NotuPushUPIIZ | Notificaacion"),
      ),
      body: Column(
        crossAxisAlignment: CrossAxisAlignment.center,
        children: [
          Padding(
            padding: const EdgeInsets.symmetric(vertical: 25),
            child: Text(
              notificacion.titulo,
              style: TextStyle(fontSize: 24, fontWeight: FontWeight.bold),
              textAlign: TextAlign.center,
            ),
          ),
          Container(
            decoration: BoxDecoration(
              color: Colors.yellow[200],
            ),
            padding: EdgeInsets.only(top: 50, bottom: 15, left: 8, right: 8),
            margin: EdgeInsets.symmetric(vertical: 30, horizontal: 40),
            child: Column(
              children: [
                Text(
                  notificacion.descripcion,
                  style: TextStyle(fontSize: 18),
                ),
                SizedBox(
                  height: 25,
                ),
                Text(
                  'Envíado: ${notificacion.enviado}',
                  style: TextStyle(color: Colors.grey[500], fontSize: 12),
                  textAlign: TextAlign.left,
                ),
              ],
            ),
          ),
          Expanded(
            child: Row(
              mainAxisAlignment: MainAxisAlignment.center,
              crossAxisAlignment: CrossAxisAlignment.end,
              children: [
                Padding(
                  padding: const EdgeInsets.only(bottom: 20.0),
                  child: RaisedButton(
                    padding: EdgeInsets.symmetric(horizontal: 25, vertical: 8),
                    color: Colors.red,
                    child: Text(
                      "Regresar",
                      style: TextStyle(
                          fontWeight: FontWeight.bold,
                          color: Colors.white,
                          fontSize: 20),
                    ),
                    onPressed: () => Navigator.pop(context),
                  ),
                ),
              ],
            ),
          )
        ],
      ),
    );
  }
}
