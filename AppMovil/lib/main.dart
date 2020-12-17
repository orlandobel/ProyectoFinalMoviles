import 'package:AppMovil/views/login.dart';
import 'package:flutter/material.dart';

import 'views/notificaciones.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'PushNotiUPIIZ',
      theme: ThemeData(
        primarySwatch: Colors.blue,
        visualDensity: VisualDensity.adaptivePlatformDensity,
      ),
      //home: Notificaciones(),
      home: LoginPage(),
    );
  }
}