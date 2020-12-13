import 'package:flutter/material.dart';

class Detalles extends StatelessWidget {
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
              "Notificación",
              style: TextStyle(fontSize: 24, fontWeight: FontWeight.bold),
              textAlign: TextAlign.center,
            ),
          ),
          Container(
            decoration: BoxDecoration(
              color: Colors.yellow[200],
            ),
            padding: EdgeInsets.symmetric(vertical: 50, horizontal: 8),
            margin: EdgeInsets.symmetric(vertical: 30, horizontal: 40),
            child: Text(
              "Mensaje de prueba para la vista de detalles de las notificaciones",
              style: TextStyle(fontSize: 18),
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
