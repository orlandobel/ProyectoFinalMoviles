import 'package:NotiPush/models/usuario.dart';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';
import 'dart:convert';

class AuthController {
  static final String _baseUri = 'http://192.168.1.110:3000';

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
    final response =
        await http.post('$_baseUri/usuarios/register', body: sendData);

    final recibedData = jsonDecode(response.body);

    return recibedData;
  }

  static Future<void> setPreferences(Usuario usuario) async {
    SharedPreferences prefs = await SharedPreferences.getInstance();

    await prefs.setInt("id", usuario.id);
    await prefs.setString("nombre", usuario.nombre);
    await prefs.setString("boleta", usuario.boleta);
    //await prefs.setString("token", "someToken");
    await prefs.setInt("tipo", usuario.tipo);
    await prefs.setInt("programa_id", usuario.programaId);
    await prefs.setBool("logeado", true);
  }

  static Future<Usuario> getLogedUsuario() async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    final id = await prefs.getInt("id");
    final nombre = await prefs.getString("nombre");
    final boleta = await prefs.getString("boleta");
    //final token = await prefs.getString("token");
    final tipo = await prefs.getInt("tipo");
    final programaId = await prefs.getInt("programa_id");

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
  }
}
