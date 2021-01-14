const express = require('express');
const controller = require('../controllers/notificaciones.controller');

const router = express.Router();

router.get('/', controller.getNotificaciones);

router.post('/', controller.sendNotificacion);

module.exports = router;