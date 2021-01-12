const mysql = require('mysql');
const { promisify } = require('util');
const dotenv = require('dotenv');
const { Console } = require('console');
dotenv.config();

const database = {
    host: process.env.DB_HOST,
    user: process.env.DB_USERNAME,
    password: process.env.DB_PASSWORD,
    database: process.env.DB_DATABASE
}

const pool = mysql.createPool(database);

pool.getConnection((error, connection) => {
    console.log(process.env.DB_PASSWORD);
    if(error) {
        if(error.code === 'PROTOCOL_CONNECTION_LOST') {
            console.error("DATABASE CONNECTION WAS CLOSE");
        }

        if(error.code === 'ER_CON_COUNT_ERROR') {
            console.error('DATABASE HAS TO MANY CONNECTIONS');
        }

        if(error.code === 'ECONNREFUSED') { 
            console.error('DATABASE CONNECTION WAS REFUSED');
        }
    }

    if (connection) {
        connection.release();
        console.log("CONNECTED TO DATABASE");
        return;
    }
});

// cambia los callback a promesas
pool.query = promisify(pool.query);

module.exports = pool;