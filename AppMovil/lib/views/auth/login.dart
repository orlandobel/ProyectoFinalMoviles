import 'package:NotiPush/controllers/auth_controller.dart';
import 'package:NotiPush/models/usuario.dart';
import 'package:NotiPush/views/auth/registro.dart';
import 'package:NotiPush/views/notificaciones/notificaciones.dart';
import 'package:flutter/material.dart';
import 'package:fluttertoast/fluttertoast.dart';
import '../drawer.dart';

class LoginPage extends StatelessWidget {
  final _boletaController = TextEditingController();
  final _passController = TextEditingController();

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container(
        padding: EdgeInsets.symmetric(horizontal: 20),
        decoration: BoxDecoration(color: Colors.white),
        child: ListView(children: [
          Image.asset(
            'assets/images/login_logo.png',
            width: 200,
          ),
          Padding(
            padding: EdgeInsets.only(bottom: 25),
            child: TextFormField(
              textAlign: TextAlign.center,
              decoration:
                  InputDecoration(hintText: 'Boleta o nombre de usuario'),
              obscureText: false,
              controller: _boletaController,
            ),
          ),
          TextFormField(
            textAlign: TextAlign.center,
            decoration: InputDecoration(hintText: 'Contraseña del SAES'),
            obscureText: true,
            controller: _passController,
          ),
          Container(
              //Boton continuar
              padding: const EdgeInsets.only(top: 50),
              child: RaisedButton(
                child: Text(
                  'Continuar',
                  style: TextStyle(fontWeight: FontWeight.bold, fontSize: 18),
                ),
                textColor: Colors.white,
                color: Colors.blue,
                onPressed: () {
                  String boleta = _boletaController.value.text;
                  String pass = _passController.value.text;

                  AuthController.login(boleta, pass).then((respuesta) {
                    if (respuesta['estatus']) {
                      if (respuesta['registrado']) {
                        final usuario = Usuario.fromJson(respuesta['usuario']);

                        AuthController.setPreferences(usuario).then((_) {
                          Navigator.push(
                            context,
                            MaterialPageRoute(
                              builder: (context) =>
                                  Notificaciones(usuario: usuario),
                            ),
                          );
                        });

                        print(usuario);
                      } else {
                        Navigator.push(
                          context,
                          MaterialPageRoute(
                            builder: (context) => Registro(boleta: boleta),
                          ),
                        );
                      }
                    } else {
                      String mensaje = respuesta['mensaje'] ??
                          'Ha ocurrido un error al conectar con el servidor';

                      Fluttertoast.showToast(
                        msg: mensaje,
                        toastLength: Toast.LENGTH_LONG,
                        gravity: ToastGravity.CENTER,
                        timeInSecForIosWeb: 2,
                        fontSize: 16,
                      );
                    }
                  });
                },
              ))
        ]),
      ),
    );
  }
}
