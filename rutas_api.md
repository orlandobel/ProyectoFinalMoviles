##### Grupos

**Obtencion de los grupos**
*localhost:3000*/grupos/
    - método: GET
    - recibe: nada
    - retorna: 
        {
            grupos: grupos encontrados,
            mensaje: Si hay un errror aparecera aqui un mensaje, si la consulta sale bien estará vacío,
            estatus: *true* si la consulta ha salido bien, *false* si la consulta ha tenido errores
        }

**Creacion de grupos**
*localhost:3000*/grupos/create
    - método: POST
    - recibe: 
        {
            nombre: nombre del grupo,
            descripcion: descripcion del grupo
        }
    - retorna:
        {
            mensaje: mensaje de error o de exito según sea el caso,
            estatus *true* si la consulta ha salido bien, *false* si la consulta ha tenido errores
        }

**Actualización de grupos**
*localhost:3000*/grupos/update
    - método: PUT
    - recibe: 
        {
            nombre: nombre del grupo,
            descripcion: descripcion del grupo,
            grupo_id: id del grupo a modificar
        }
    - retorna:
        {
            mensaje: mensaje de error o de exito según sea el caso,
            estatus *true* si la consulta ha salido bien, *false* si la consulta ha tenido errores
        }

**Eliminar grupos**
*localhost:3000*/grupos/delete
    - método: DELETE
    - recibe: 
        {
            grupo_id: id del grupo a modificar
        }
    - retorna:
        {
            mensaje: mensaje de error o de exito según sea el caso,
            estatus *true* si la consulta ha salido bien, *false* si la consulta ha tenido errores
        }

**Creacion de agrupamientos**
*localhost:3000*/grupos/agrupacion
    - método: POST
    - recibe: 
        {
            usuario_id: id del usuario
            grupo_id: id del grupo
        }
    - retorna:
        {
            mensaje: mensaje de error o de exito según sea el caso,
            estatus *true* si la consulta ha salido bien, *false* si la consulta ha tenido errores
        }

**Eliminar agrupacion**
*localhost:3000*/grupos/agrupacion
    - método: DELETE
    - recibe: 
        {
            id: id del agrupamiento a eliminar
        }
    - retorna:
        {
            mensaje: mensaje de error o de exito según sea el caso,
            estatus *true* si la consulta ha salido bien, *false* si la consulta ha tenido errores
        }

**Obtener notificaciones**
*localhost:3000*/notificaciones
    - método: GET
    - recibe: 
        {
            usuario_id: id del usuario que hace la consulta
        }
    - retorna:
        {
            notificaciones: arreglo de las notificaciones recuperadas
            mensaje: mensaje en caso de que exista algun error,
            estatus *true* si la consulta ha salido bien, *false* si la consulta ha tenido errores
        }

**Envíar notificaciones**
*localhost:3000*/notificaciones
    - método: POST
    - recibe: 
        {
            titulo: titulo de la notificacion
            descripcion: mensaje que se envía,
            grupo_id: id del grupo al que va dirigido la notificacion
        }
    - retorna:
        {
            mensaje: mensaje de error o de exito según sea el caso,
            estatus *true* si la consulta ha salido bien, *false* si la consulta ha tenido errores
        }