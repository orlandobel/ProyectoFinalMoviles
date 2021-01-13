const express = require('express');
const controller = require('../controllers/grupos.controller');

const router = express.Router();

router.get('/', controller.getGrupos);

router.post('/create', controller.createGrupo);

router.put('/update', controller.updateGrupo);

router.delete('/delete', controller.deleteGrupo);

module.exports = router;