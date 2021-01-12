/* Dependencias o modulos requeridos */
const cors = require('cors');
const express = require('express');
const morgan = require('morgan');
const dotenv = require('dotenv');

/* Iniciando la app */
const app = express();

/* Configuraciones
 * 1. Busca un archivo .env y atrubuto PORT, si no existen establece el puerto 300 por dedfecto
 * 2. Visualización de metodo, ruta, estatus HTTP y tiempo de respuesta
        de las peticiones al servidor (GET /pruebas 200 7.489 ms - 30)
 * 3. Establece la comunicacion por medio de JSON
 * 4. Declara que habra peticiones externas
 */
app.set('port', process.env.PORT || 3000); 
app.use(morgan('dev'));
app.use(express.json());
app.use(cors({ origin: true }));
dotenv.config(); // permite utilizar el archivo .env en caso de querer usar otro puerto
 
/* Rutas del servidor */
// app.use('/path', require('./routes/fileName.routes'));
app.use('/pruebas', require('./routes/ejemplo.routes'));

app.listen(app.get('port'), () => {
    console.log('Server listening on port ', app.get('port'));
});