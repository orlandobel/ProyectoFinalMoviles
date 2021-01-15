const express = require('express');
const controller = require('../controllers/usuarios.controller');

const router = express.Router();

router.get('/', controller.getUsuarios);

router.post('/create', controller.createUsuario);

router.put('/update', controller.updateUsuario);

router.delete('/delete', controller.deleteUsuario);


module.exports = router;