import 'package:NotiPush/models/notificacion.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

class NotificacionesController {
  static final String _baseUri = 'http://192.168.1.110:3000';

  static Future<dynamic> getNotificaciones(int usuario_id) async {
    List<Notificacion> notificaciones = new List();

    final request =
        await http.get('$_baseUri/notificaciones?usuario_id=$usuario_id');
    final response = jsonDecode(request.body);

    if (response['estatus']) {
      List datosNotificaciones = response['notificaciones'];

      datosNotificaciones.forEach((element) {
        Notificacion notificacion = Notificacion.fromJson(element);

        notificaciones.add(notificacion);
      });
    }

    return notificaciones;
  }
}
