const con = require('../connection');
const Grupos = {};

Grupos.getGrupos = async (req, res) => {
    let estatus;
    let grupos;
    let mensaje;

    try {
        grupos = await con.query("SELECT * FROM grupos");

        estatus = (grupos === null) ? false : true;
        mensaje = (grupos === null) ? "No se han encontrado grupos" : "";

    } catch (error) {
        grupos = null;
        mensaje = "Error al intentar obtener los grupos, intentelo de nuevo más tarde";
        estatus = false;
    }

    res.json({
        grupos,
        mensaje,
        estatus
    });

}

Grupos.createGrupo = async (req, res) => {
    const { nombre, descripcion } = req.body;
    const time = new Date();

    const data = {
        nombre, 
        descripcion,
        created_at: time,
        updated_at: time
    };

    let mensaje;
    let estatus;

    try {
        await con.query('INSERT INTO grupos SET ?', [data]);

        mensaje = "Grupo creado exitosamente";
        estatus = true;
    } catch (error) {
        console.error(error);

        if (error.code === 'ER_NO_DEFAULT_FOR_FIELD')
            mensaje = "Hay campos vacios al intentar crear, por favor revise los datos y vuelva a intentarlo";
        else
            mensaje = "Error al intentar obtener los grupos, intentelo de nuevo más tarde";

        estatus = false;

    }

    res.json({
        mensaje,
        estatus
    });

}

Grupos.updateGrupo = async (req, res) => {
    const { grupo_id } = req.body;
    const { nombre, descripcion } = req.body;

    let mensaje;
    let estatus;

    const updateData = {
        nombre,
        descripcion,
        updated_at: new Date()
    };

    console.log(grupo_id);

    if (grupo_id === null || grupo_id === undefined) {
        mensaje = "No se especifico un grupo a editar, falta el ID";
        estatus = false;
    } else {
        try {
            await con.query("UPDATE grupos SET ? WHERE id = ?", [updateData, grupo_id]);

            mensaje = " Grupo actualizado correctametne";
            estatus = true;
        } catch (error) {
            console.log(error);

            mensaje = "Error al actualizar grupo";
            estatus = false;
        }
    }
    res.json({
        mensaje,
        estatus
    });
}

Grupos.deleteGrupo = async (req, res) => {
    const { grupo_id } = req.body;

    let mensaje;
    let estatus;

    if(grupo_id === null || grupo_id === undefined) {
        mensaje = "No se ha encontrado el grupo a eliminar, falta el ID";
        estatus = false;
    } else {
        try {
            await con.query("DELETE FROM grupos WHERE id = ?", [grupo_id]);

            mensaje = "Grupo eliminado exitosamente";
            estatus = true;
        } catch(error) {
            console.error(error);

            mensaje = "Ha ocurrido un error al eliminar el grupo";
            estatus = false;
        }
    }

    res.json({
        mensaje,
        estatus
    });
}

Grupos.joinGrupo = async(req, res) => {
    const { usuario_id, grupo_id } = req.body;
    const time = new Date();

    const data = {
        usuario_id,
        grupo_id,
        created_at: time,
        updated_at: time,
    };

    let mensaje;
    let estatus;

    try {
        const relacion = 
            await con.query("SELECT * FROM agrupamientos WHERE usuario_id = ? AND grupo_id = ?", [usuario_id, grupo_id]);

        console.log(relacion);
        console.log(relacion.length);

        if(relacion.length < 1) {
            await con.query("INSERT INTO agrupamientos SET ?", [data]);
    
            mensaje = "El usuario se a añadido al grupo exitosamente";
            estatus = true;
        } else {
            mensaje = "El usuario ya está registrado en este grupo";
            estatus = false;
        }
    } catch (error) {
        console.error(error);

        mensaje = "Ha ocurrido un error al agregar el usuario al grupo, intentelo de nuevo más tarde";
        estatus = false;
    }

    res.json({
        mensaje,
        estatus
    });
}

Grupos.leaveGrupo = async(req, res) => {
    const { id } = req.body;

    let mensaje;
    let estatus;

    try {
        await con.query("DELETE FROM agrupamientos WHERE id = ?", [id]);

        mensaje = "El usuario se a removido del grupo exitosamente";
        estatus = true;
    } catch (error) {
        console.error(error);

        mensaje = "Ha ocurrido un error al remover al usuario del grupo, intentelo de nuevo más tarde";
        estatus = false;
    }

    res.json({
        mensaje,
        estatus
    });
}

module.exports = Grupos;