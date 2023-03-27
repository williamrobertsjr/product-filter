const express = require('express');
const mysql = require('mysql');

const app = express();

app.listen('3000', () => {
    console.log("server started on port 3000");
})

// const conn = mysql.createConnection({
//     host: "localhost",
//     user: "xaykdbmuyu",
//     password: "T6NGvsSwjD"
// });

// conn.connect(function(err) {
//     if (err) throw err;
//     console.log("Connected!");
// });

