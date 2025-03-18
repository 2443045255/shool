const http = require("http")
const path = require("path")
const fs = require("fs")

const post = 3000

const httpServer = http.createServer()

httpServer.on("request", (req, res) => {
  res.writeHead(200, {
    "content-type": 'text/html;charset=utf8'
  })
  var fileUrl = null
  if (!path.extname(req.url)) {
    fileUrl = `.${req.url}/index.html`
  } else {
    fileUrl = `.${req.url}`
  }
  fs.readFile(path.join(__dirname, "./htmlFile/" + fileUrl), 'utf-8', (err, data) => {
    if (err) {
      res.end("路径不存在")
    } else {
      res.end(data)
    }
  })
})

httpServer.listen(post, () => {
  console.log("http://localhost:" + post);
})