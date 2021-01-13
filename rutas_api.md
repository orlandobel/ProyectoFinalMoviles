##### Grupos

**Obtencion de los grupos**
*localhost:3000*/grupos/
    - recibe: nada
    - retorna: 
        {
            grupos: grupos encontrados,
            mensaje: Si hay un errror aparecera aqui un mensaje, si la consulta sale bien estará vacío,
            estatus: *true* si la consulta ha salido bien, *false* si la consulta ha tenido errores
        }

**Creacion de grupos**
*localhost:3000*/grupos/create
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

**Creacion de grupos**
*localhost:3000*/grupos/delete
    - recibe: 
        {
            grupo_id: id del grupo a modificar
        }
    - retorna:
        {
            mensaje: mensaje de error o de exito según sea el caso,
            estatus *true* si la consulta ha salido bien, *false* si la consulta ha tenido errores
        }