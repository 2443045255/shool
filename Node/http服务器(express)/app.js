const http = require('http')
const path = require('path')
const express = require('express')
const httpPort = 801
const app = express()

app.use(express.static(path.join(__dirname, './public')))

const httpServer = http.createServer(app)

httpServer.listen(httpPort, () => {
    console.log(`http://127.0.0.1:${httpPort}`);
})