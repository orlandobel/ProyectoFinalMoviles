import 'package:NotiPush/views/detalles.dart';
import 'package:flutter/material.dart';

class Notificaciones extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("NotuPushUPIIZ | Notificaciones"),
      ),
      body: Container(
        child: ListView(
          padding: EdgeInsets.all(12),
          children: [
            Notificacion(asunto: "Notificacion 1"),
            Notificacion(asunto: "Notificacion 2"),
            Notificacion(asunto: "Notificacion 3"),
            Notificacion(asunto: "Notificacion 4"),
          ],
        ),
      ),
    );
  }
}

class Notificacion extends StatelessWidget {
  final String asunto;

  const Notificacion({
    Key key,
    @required this.asunto,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: () => Navigator.push(
        context,
        MaterialPageRoute(
          builder: (context) => Detalles(),
        ),
      ),
      child: Container(
        padding: EdgeInsets.only(bottom: 8),
        margin: EdgeInsets.only(bottom: 8),
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
          asunto,
          style: TextStyle(fontSize: 20),
        ),
      ),
    );
  }
}
