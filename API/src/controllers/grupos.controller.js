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
    const data = req.body;
    let mensaje;
    let estatus;

    try {
        await con.query('INSERT INTO grupos SET ?', [data]);

        mensaje = "Grupo creado exitosamente"
        estatus = true;
    } catch (error) {
        console.error(error);

        if (error.code === 'ER_NO_DEFAULT_FOR_FIELD')
            mensaje = "Hay campos vacios al intentar crear, por fabor revise los datos y vuelva a intentarlo";
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
        descripcion
    };

    console.log(grupo_id);

    if (grupo_id === null || grupo_id === undefined) {
        mensaje = "No se especifico un grupo a editar, falta el ID"
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

            mensaje = "Grupo eliminado exitozamente";
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

module.exports = Grupos;