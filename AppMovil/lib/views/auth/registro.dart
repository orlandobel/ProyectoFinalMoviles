import 'package:NotiPush/controllers/auth_controller.dart';
import 'package:NotiPush/models/usuario.dart';
import 'package:flutter/material.dart';
import 'select.dart';

class Registro extends StatelessWidget {
  final String boleta;
  final _nombreController = TextEditingController();
  final tipoSelect = SelectInput(
    {
      "Alumno": 0,
      "Docente": 1,
      "PAAE": 2,
    },
  );

  final programaSelect = SelectInput(
    {
      "Ing. en Sistemas Computacionales": 1,
      "Ing. en Mecatronica": 2,
      "Ing. en Alimentos": 3,
      "Ing. Ambiental": 4,
      "Ing. Metalurgica": 5,
    },
    dropdownValue: 1,
  );

  Registro({@required this.boleta});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Padding(
        padding: const EdgeInsets.symmetric(horizontal: 30.0),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          crossAxisAlignment: CrossAxisAlignment.center,
          children: [
            Padding(
              padding: const EdgeInsets.only(bottom: 25),
              child: TextFormField(
                textAlign: TextAlign.center,
                decoration: InputDecoration(hintText: "Nombre completo"),
                controller: _nombreController,
              ),
            ),
            tipoSelect,
            programaSelect,
            RaisedButton(
              child: Text(
                'Continuar',
                style: TextStyle(fontWeight: FontWeight.bold, fontSize: 18),
              ),
              textColor: Colors.white,
              color: Colors.green,
              onPressed: () {
                Map sendData = {
                  "nombre": _nombreController.value.text,
                  "tipo": tipoSelect.dropdownValue,
                  "programa_id": programaSelect.dropdownValue
                };

                AuthController.register(sendData).then((response) {
                  if (response['estatus']) {
                    final usuario = Usuario.fromJson(response['usuario']);
                  } else {}
                });
              },
            ),
          ],
        ),
      ),
    );
  }
}
