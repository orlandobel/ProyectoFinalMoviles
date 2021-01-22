const axios = require('axios');
const con = require('../connection');
const Usuarios ={};

Usuarios.getUsuarios = async (req, res) =>{
    let status;
    let usuarios;
    let mensaje;
    try {
        usuarios = await con.query("SELECT * from usuarios");
        status  = (usuarios.length === 0) ? false : true;
        mensaje = (usuarios.length === 0) ? "No se han encontrado grupos" :"";
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

Usuarios.lgoin = async (req, res) => {
    const { boleta, pass } = (req.body.boleta === undefined || req.body.boleta === null)? req.query : req.body;
    const url = "http://sistemas.upiiz.ipn.mx/isc/nopu/api/login.php?usuario=" + boleta + "&clave="+pass;
    let usuario = null;
    let mensaje;
    let registrado;
    let estatus;
    
    try {
        const peticion = await axios.get(url);
        console.log(peticion.data);

        if(peticion.data.estado === 1) {
            try {
                const consulta = await con.query("SELECT * FROM usuarios WHERE boleta = ?", [boleta]);
    
                console.log(boleta);
                usuario = (consulta.length > 0)? consulta[0] : null;
                estatus = true;
                registrado = (consulta.length > 0)? true : false;
    
            } catch(error) {
                console.error(error);

                mensaje = "Error al buscar el usuario, intentelo de nuevo más tarde";
                estatus = false;
            }
        } else {
            mensaje = "Credenciales incorrectas";
            registrado = false;
            estatus = false;
        }
        
    } catch(error) {
        console.log(error);

        mensaje = "Error al conectar al validar las credenciales";
        estatus = false;
    }

    res.json({
        usuario,
        mensaje,
        registrado,
        estatus
    });
}

Usuarios.createUsuario = async(req, res) =>{
    const { nombre, boleta, token, tipo, programa_id } = req.body;
    const time = new Date();
    let usuario = null;

    const data = {
        nombre,
        boleta,
        token,
        tipo,
        programa_id,
        created_at: time,
        updated_at: time,
    };
    
    let mensaje;
    let status;

    try {
        const consulta = await con.query('INSERT INTO usuarios SET ?',[data]);
        const id = consulta.insertId;

        const creado = await con.query('SELECT * FROM usuarios WHERE id = ?', [id]);
        usuario = creado[0];

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
        usuario,
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

Usuarios.setToken = async (req, res) => {
    const { usuario_id, token } = req.body;
    let mensaje;
    let estatus;

    console.log(req.body);

    try {
        await con.query('UPDATE usuarios SET token = ? WHERE id = ?', [token, usuario_id]);

        mensaje = "token actualizado";
        estatus = true;
    } catch(error) {
        console.log(error);

        mensaje = "Error al actualizar el token";
        estatus = false;
    }

    res.json({
        mensaje,
        estatus
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