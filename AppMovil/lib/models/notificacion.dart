class Notificacion {
  num _id;
  String _titulo;
  String _descripcion;
  dynamic _enviado;

  get id => this._id;
  get titulo => this._titulo;
  get descripcion => this._descripcion;
  get enviado => this._enviado;

  Notificacion(this._id, this._titulo, this._descripcion, this._enviado);

  factory Notificacion.fromJson(Map<dynamic, dynamic> data) {
    return Notificacion(
      data['id'],
      data['titulo'],
      data['descripcion'],
      data['created_at'],
    );
  }
}
