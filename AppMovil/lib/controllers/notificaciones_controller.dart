import 'package:NotiPush/models/notificacion.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

class NotificacionesController {
  static final String _baseUri = 'http://192.168.1.110:3000';

  static Future<dynamic> getNotificaciones(num usuarioId) async {
    List<Notificacion> notificaciones = new List();

    final request =
        await http.get('$_baseUri/notificaciones?usuario_id=$usuarioId');
    final response = jsonDecode(request.body);

    if (response['estatus']) {
      List datosNotificaciones = response['notificaciones'];

      datosNotificaciones.forEach((element) {
        if (element['titulo'] != null) {
          Notificacion notificacion = Notificacion.fromJson(element);

          notificaciones.add(notificacion);
        }
      });
    }

    return notificaciones;
  }

  static Future<dynamic> getNotificacion(num id) async {
    print('hola');
    final request = await http.get('$_baseUri/notificaciones/single?id=$id');
    final response = jsonDecode(request.body);
    print(response);
    if (response['estatus']) {
      Notificacion not = Notificacion.fromJson(response['notificacion']);

      return not;
    }

    return response['mensaje'];
  }
}
