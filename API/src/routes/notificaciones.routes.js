const express = require('express');
const controller = require('../controllers/notificaciones.controller');

const router = express.Router();

router.get('/', controller.getNotificaciones);

router.get('/single', controller.getNotificacion);

router.post('/', controller.sendNotificacion);

module.exports = router;