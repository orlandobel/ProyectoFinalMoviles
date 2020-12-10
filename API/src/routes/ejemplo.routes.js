/* Dependencias */
const express = require("express");

// Ruteador
const router = express.Router();

/* Decalración de rutas */

// get localhosthost:3000/pruebas/
router.get('/', (req, res) => {
    res.json({
        "Prueba": "Prueba de rutas 1"
    });
});

// post localhost:3000/pruebas/
router.post('/', (req, res) => {
    console.log("Ruta con metodo post");
    res.json({
        "Prueba": "Prueba de rutas 2"
    });
});

module.exports = router;
