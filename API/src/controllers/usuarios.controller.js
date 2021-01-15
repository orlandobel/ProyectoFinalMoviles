const con = require('../connection');
const Usuarios ={};

Usuarios.getUsuarios = async (req, res) =>{
    let status;
    let usuarios;
    let mensaje;
    try {
        usuarios = await con.query("SELECT * from usuarios");
        status  = (usuarios === null) ? false : true;
        mensaje = (usuarios === null) ? "No se han encontrado grupos" :"";
    } catch (error) {
        usuarios = null;
        mensaje = "Error al intentar obtener los usuarios, intentelo de nuevo mas tarde";
        estatus = false;
    }

    res.json({
        usuarios,
        mensaje,
        status
    });
}

Usuarios.createUsuario = async(req, res) =>{
    const { nombre, boleta, token, tipo, programa_id, remember_token } = req.body;
    const time = new Date();

    const data = {
        nombre,
        boleta,
        token,
        tipo,
        programa_id,
        remember_token,
        created_at: time,
        updated_at: time,
    };
    
    let mensaje;
    let status;

    try {
        await con.query('INSERTED INTO usuario SET ?',[data]);
        mensaje ="usuario creado satisfactoriamente";
        status = true;
    } catch (error) {
        console.error(error);

        if(error.code === 'ER_NO_DEFAULT_FOR_FIELD')
            mensaje ="Hay errores en los campos, por favor volver a revisar e intentar nuevamente";
        else
            mensaje = "Error al intentar obtener los usuarios, intentelo de nuevo más tarde";
        
        status = false;
    }

    res.json({
        mensaje,
        status
    });
}

Usuarios.updateUsuario = async (req, res) =>{
    const { boleta } = req.body;
    const{ nombre, token, tipo, programa_id, remember_token } = req.body;

    let mensaje;
    let status;

    const updateData = {
        nombre,
        token,
        tipo,
        programa_id,
        remember_token,
        updated_at: time,
    };

    console.log(grupos_id);

    if (boleta=== null || boleta === undefined) {
        mensaje = "No se especifico un usuario a editar, falta la boleta o número de empleado";
        estatus = false;
    } else {
        try {
            await con.query("UPDATE usuarios SET ? WHERE id = ?", [updateData, boleta]);

            mensaje = " Usuario actualizado correctametne";
            estatus = true;
        } catch (error) {
            console.log(error);

            mensaje = "Error al actualizar el usuario";
            estatus = false;
        }
    }
    res.json({
        mensaje,
        status
    });
}

Usuarios.deleteUsuario = async (req,res) =>{
    const { boleta } = req.body;


    let mensaje;
    let status;

    if(boleta === null || boleta === undefined) {
        mensaje = "No se ha encontrado el usuario a eliminar, falta el ID";
        estatus = false;
    } else {
        try {
            await con.query("DELETE FROM usuarios WHERE id = ?", [boleta]);

            mensaje = "Usuario eliminado exitosamente";
            estatus = true;
        } catch(error) {
            console.error(error);

            mensaje = "Ha ocurrido un error al eliminar al Usuario";
            estatus = false;
        }
    }

    res.json({
        mensaje,
        status
    });

}
module.exports = Usuarios;