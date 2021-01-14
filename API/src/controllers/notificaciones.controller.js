const con = require('../connection');

const Notificacion = {};

Notificacion.getNotificaciones = async (req, res) => {
    const { usuario_id } = req.body;
    let notificaciones = null;
    let mensaje = null;
    let estatus;

    if (usuario_id === null || usuario_id === undefined) {
        mensaje = "No se ha especificado para obtener las notificaciones,revise la información y vuelva a intentar";
        estatus = false;
    } else {
        try {
            const sql =
                "SELECT notificaciones.id, notificaciones.titulo, notificaciones.descripcion, notificaciones.created_at, grupos.nombre "
                + "FROM notificaciones "
                + "LEFT JOIN grupos ON notificaciones.grupo_id = grupos.id "
                + "RIGHT JOIN agrupamientos ON grupos.id = agrupamientos.grupo_id "
                + "LEFT JOIN usuarios ON agrupamientos.usuario_id = usuarios.id WHERE usuarios.id = ?;";

            notificaciones = await con.query(sql, [usuario_id]);
            estatus = true;
        } catch (error) {
            console.log(error);

            mensaje = "Error al obtener las notificaciones, intentelo de nuevo más tarde";
            estatus = false;
        }
    }

    res.json({
        notificaciones,
        mensaje,
        estatus
    });
}

Notificacion.getNotificacion = async (req, res) => {
    const { id } = req.body;
    let notificacion = null;
    let mensaje = null;
    let estatus;

    try {
        notificacion = await con.query("SELECT * FROM notificaciones WHERE id = ?", [id]);

        estatus = true;
    } catch (error) {
        console.log(error);

        mensaje = "ha ocurrido un error al obtener la notificación, intentelo denuevo más tarde";
        estatus = false;
    }

    res.json({
        notificacion,
        mensaje,
        estatus
    });
}

Notificacion.sendNotificacion = async (req, res) => {
    const { titulo, descripcion, grupo_id } = req.body;
    const fecha = new Date();

    let mensaje;
    let estatus;

    if (grupo_id === null || grupo_id === undefined) {
        mensaje = "Notificación no enviada, no se ha especificado un grupo destino";
        estatus = false;
    } else {
        try {
            const data = {
                titulo,
                descripcion,
                grupo_id,
                created_at: fecha,
                updated_at: fecha
            };

            await con.query("INSERT INTO notificaciones SET ?", [data]);

            mensaje = "Notificación enviada";
            estatus = true;
        } catch (error) {
            console.log(error);

            if (error.code === 'ER_NO_DEFAULT_FOR_FIELD' || error.code === "ER_BAD_NULL_ERROR")
                mensaje = "Hay campos vacios al intentar crear, por fabor revise los datos y vuelva a intentarlo";
            else
                mensaje = "Ha ocurrido un error al enviar la notificación, intentelo de nuevo más tarde";

            estatus = false;
        }
    }

    res.json({
        mensaje,
        estatus
    });
}

module.exports = Notificacion;