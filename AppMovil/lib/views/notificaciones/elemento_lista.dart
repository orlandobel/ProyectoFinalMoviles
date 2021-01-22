import 'package:NotiPush/models/notificacion.dart';
import 'package:NotiPush/views/notificaciones/detalles_notificacion.dart';
import 'package:flutter/material.dart';

class Elemento extends StatelessWidget {
  final Notificacion notificacion;

  const Elemento({
    Key key,
    @required this.notificacion,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: () => Navigator.push(
        context,
        MaterialPageRoute(
          builder: (context) => Detalles(notificacion: notificacion),
        ),
      ),
      child: Container(
        padding: EdgeInsets.only(bottom: 10),
        margin: EdgeInsets.symmetric(vertical: 5),
        decoration: BoxDecoration(
          border: Border(
            bottom: BorderSide(
              color: Colors.black38,
              style: BorderStyle.solid,
              width: 1,
            ),
          ),
        ),
        child: Text(
          notificacion.titulo,
          style: TextStyle(fontSize: 20),
        ),
      ),
    );
  }
}
