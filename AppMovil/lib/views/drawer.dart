import 'package:NotiPush/controllers/auth_controller.dart';
import 'package:NotiPush/models/usuario.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';

import 'notificaciones.dart';

class DrawerMenu extends StatelessWidget {
  final String title;
  final Usuario usuario;

  DrawerMenu({
    Key key,
    this.title = '',
    @required this.usuario,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    print(usuario.id);
    return Scaffold(
      appBar: AppBar(title: Text(title)),
      drawer: Drawer(
        child: ListView(
          padding: EdgeInsets.zero,
          children: <Widget>[
            DrawerHeader(
              child: Column(
                children: [
                  Padding(
                    padding: const EdgeInsets.symmetric(vertical: 5),
                    child: Image.asset(
                      'assets/images/login_logo.png',
                      width: 70,
                    ),
                  ),
                  Padding(
                    padding: const EdgeInsets.symmetric(vertical: 5),
                    child: Container(
                      child: Text(
                        'Nombre Usuario',
                        style: TextStyle(fontWeight: FontWeight.bold),
                      ),
                    ),
                  ),
                  Container(
                    child: Text(
                      'example@gmail.com',
                      style: TextStyle(color: Colors.grey, fontSize: 14),
                    ),
                  )
                ],
              ),
              decoration: BoxDecoration(
                color: Colors.white70,
              ),
            ),
            ListTile(
              title: Row(
                children: [
                  Padding(
                    padding: const EdgeInsets.only(right: 10),
                    child: Image.asset(
                      'assets/images/icon_home.png',
                      width: 30,
                    ),
                  ),
                  Text('Notificaciones'),
                ],
              ),
              onTap: () {
                Navigator.push(
                    context,
                    new MaterialPageRoute(
                        builder: (context) => Notificaciones()));
              },
            ),
            ListTile(
              title: Row(
                children: [
                  Padding(
                    padding: const EdgeInsets.only(right: 10),
                    child: Image.asset(
                      'assets/images/icon_contacto.png',
                      width: 30,
                    ),
                  ),
                  Text('Salir'),
                ],
              ),
              onTap: () {
                AuthController.logOut().then((value) => SystemNavigator.pop());
              },
            ),
          ],
        ),
      ),
    );
  }
}
