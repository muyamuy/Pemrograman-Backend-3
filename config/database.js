// import mysql
const mysql = require("mysql");

// Import dotenv dan jalankan method config
require("dotenv").config();

// Destructing object process.env
const {
    DB_HOST,
    DB_USERNAME,
    DB_PASSWORD,
    DB_DATABASE
} = process.env;

// Update konfigurasi database dari file .env
const db = mysql.createConnection({
    host: DB_HOST,
    user: DB_USERNAME,
    password: DB_PASSWORD,
    database: DB_DATABASE,
});

// const db = mysql.createConnection({
//     host: "localhost",
//     user: "root",
//     password: "",
//     database: "express_rest_api",
// });

db.connect((err) => {
    if (err) {
        console.log("Error Connecting" + err.stack);
        return;
    } else {
        console.log("Connected to Database");
    }
});

module.exports = db;