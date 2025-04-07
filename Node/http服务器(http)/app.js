const http = require("http")
const path = require("path")
const fs = require("fs")

const post = 801

const httpServer = http.createServer()

httpServer.on("request", (req, res) => {
    //获取url
    var fileUrl = req.url
    switch (fileUrl) {
        case "/":
            fileUrl = "/index.html"
            break;
        case "/":
            fileUrl = "/about.html"
            break;
        default:
            fileUrl = "/404.html"
            break;
    }

    fs.readFile(path.join(__dirname, "./public" + fileUrl), (err, data) => {
        res.end(data)
    })
})

httpServer.listen(post, () => {
    console.log("http://localhost:" + post);
})