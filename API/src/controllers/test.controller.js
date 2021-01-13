const con = require('../connection'); //conexion a la base de datos
const pruebas = {};

pruebas.grupos = async (req, res) => {
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

pruebas.timestamps = () => {
    const time = new Date();

    console.log(time);
}

module.exports = pruebas;