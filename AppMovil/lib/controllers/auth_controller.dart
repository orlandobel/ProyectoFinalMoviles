import 'package:NotiPush/models/usuario.dart';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';
import 'dart:convert';

class AuthController {
  static final String _baseUri = 'http://192.168.1.103:3000';

  static Future<Map<dynamic, dynamic>> login(String boleta, String pass) async {
    try {
      final response =
          await http.get('$_baseUri/usuarios/login?boleta=$boleta&pass=$pass');

      Map<dynamic, dynamic> data = jsonDecode(response.body);
      return data;
    } catch (error) {
      print(error);
      return {"estatus": false};
    }
  }

  static Future<Map<dynamic, dynamic>> register(Map sendData) async {
    final headers = <String, String>{
      'Content-Type': 'application/json; charset=UTF-8',
    };

    final response = await http.post('$_baseUri/usuarios/create',
        headers: headers, body: jsonEncode(sendData));

    final recibedData = jsonDecode(response.body);

    return recibedData;
  }

  static Future<void> setPreferences(Usuario usuario) async {
    SharedPreferences prefs = await SharedPreferences.getInstance();

    await prefs.setInt("id", usuario.id);
    await prefs.setString("nombre", usuario.nombre);
    await prefs.setString("boleta", usuario.boleta);
    await prefs.setInt("tipo", usuario.tipo);
    await prefs.setInt("programa_id", usuario.programaId);
    await prefs.setBool("logeado", true);
  }

  static Future<Usuario> getLogedUsuario() async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    final id = prefs.getInt("id");
    final nombre = prefs.getString("nombre");
    final boleta = prefs.getString("boleta");
    final tipo = prefs.getInt("tipo");
    final programaId = prefs.getInt("programa_id");

    return Usuario(id, nombre, boleta, null, tipo, programaId);
  }

  static Future<bool> isLoged() async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    return prefs.getBool('logeado') ?? false;
  }

  static Future<void> logOut() async {
    SharedPreferences prefs = await SharedPreferences.getInstance();

    await prefs.setInt("id", -1);
    await prefs.setString("nombre", "");
    await prefs.setString("boleta", "");
    await prefs.setInt("tipo", -1);
    await prefs.setInt("programa_id", -1);
    await prefs.setBool("logeado", false);
    await prefs.setBool("token", false);
  }

  static Future updateToken(String token, num id, bool eliminar) async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    bool savedToken = prefs.getBool('token') ?? false;

    if ((!savedToken && !eliminar) || (savedToken && eliminar)) {
      final headers = <String, String>{
        'Content-Type': 'application/json; charset=UTF-8',
      };

      final data = jsonEncode(<String, String>{
        'usuario_id': '$id',
        'token': token,
      });

      final request = await http.put('$_baseUri/usuarios/token',
          headers: headers, body: data);

      final response = jsonDecode(request.body);

      if (response['estatus']) {
        await prefs.setBool("token", !savedToken);
      } else {
        print(response['mensaje']);
      }
    }
  }
}
