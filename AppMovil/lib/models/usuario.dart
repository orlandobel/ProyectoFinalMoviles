class Usuario {
  num _id;
  String _nombre;
  String _boleta;
  String _token;
  num _tipo;
  num _programaId;

  get id => this._id;
  get nombre => this._nombre;
  get boleta => this._boleta;
  get token => this._token;
  get tipo => this._tipo;
  get programaId => this._programaId;

  Usuario(
    this._id,
    this._nombre,
    this._boleta,
    this._token,
    this._tipo,
    this._programaId,
  );

  factory Usuario.fromJson(Map<dynamic, dynamic> datos) {
    return Usuario(
      datos['id'],
      datos['nombre'],
      datos['boleta'],
      datos['token'],
      datos['tipo'],
      datos['programa_id'],
    );
  }
}
