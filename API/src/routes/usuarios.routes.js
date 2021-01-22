const express = require('express');
const controller = require('../controllers/usuarios.controller');

const router = express.Router();

router.get('/', controller.getUsuarios);

router.get('/login', controller.lgoin);

router.post('/create', controller.createUsuario);

router.put('/update', controller.updateUsuario);

router.put('/token', controller.setToken);

router.delete('/delete', controller.deleteUsuario);


module.exports = router;