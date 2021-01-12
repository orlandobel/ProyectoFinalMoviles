# ProyectoFinalMoviles
Proyecto final para la calse de desarrollo moviles

#### Habilitar laravel
1. Aserurate de tener la extencion de php "fileinfo"
2. Instala composer y node si no los tienes
3. Genera una copia del archivo ".env.example" renombrandola como ".env"
4. Dentro de la carpeta del Sistema web abrir una terminal de comandos y ejecutar:
   1. php artisan key:generate
   2. composer update
   3. npm i
5. para iniciar el servidor y visualizar los resultados ejecuta:
   - php artisan serve
   
>**Nota:** Cada que se añada o retiren paquetes de composer o si al ejecutar hay errores dedntro de la carpeta ***vendor*** hay que ejecutar "composer update"  
>**Nota:** Si se actualizan los paquetes de node hay que ejecutar el comando "npm i"  
>**Nota:** Se ha instalado VUEJS para intentar remplazar AJAX, pero esta a discución si se implementa o no

## Migrar la base de datos
Laravel nos permite modelar las bases de datos desde los archivos "migrations" dentro de la carpeta "database".
Para ello primero es necesario crear una base de datos en el SGBD (en este caso mysql) y configurar su acceso en el *.env*
de la siguiente manera:
1. Asegurate que la variable ***DB_HOST*** tiene el valor *localhost*
2. La variable ***DB_DATABASE*** debe de tener el nombre de la base de datos previamente creada
3. Las variables ***DB_USERNAME*** y ***DB_PASSWORD** deben tener las credenciales de acceso al SGBD en caso de existir. En caso de que no existan credenciales configuradas, las variables pueden quedar vacias

Una vez creada la base de datos y configurado el *.env* hay que ejecurat el siguiente comando en una terminal 
- *php artisan migrate:fresh --seed*
Esto cargara a la base de datos las tablas de los archivos de migración y generará datos de prueba previamente configurados

**Recursos para laravel 8**
- https://youtube.com/playlist?list=PLZ2ovOgdI-kWWS9aq8mfUDkJRfYib-SvF
- https://laravel.com/docs/8.x


#### Hbilirat NODEJS
1. Asegurate de tener instalado Node y que funcione el comando 
   - npm -v
2. Dentro de la carpeta de API ejecutar el comando
   - npm i
3. Para iniciar el servidor y poder usar sus funciones y rutas ejecutar el comando
   - npm run serve

>**nota:** Una ves iniciado el servidor de node basta con guardar los cambios para que se reinicie por si mismo y probar los cambios


### Recursos extras
**Peticiones HTTP de laravel para API** https://www.itsolutionstuff.com/post/laravel-8-guzzle-http-client-request-exampleexample.html