const con = require('../connection'); //conexion a la base de datos
const pruebas = {};

pruebas.grupos = async (req, res) => {
    var estatus;
    var grupos;

    const sql = "SELECT * FROM grupos";
    const r = await con.query(sql);
    
    if(r === null ){
        grupos = null;
        estatus = false;
    } else {
        grupos = r;
        estatus = true;
    }

    res.json({grupos, estatus});
}

module.exports = pruebas;