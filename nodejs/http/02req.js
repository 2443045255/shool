const http = require("http")
const path = require("path")
const fs = require("fs")

const httpServer = http.createServer()

httpServer.on("request", (req, res) => {
  var fileUrl = null
  if (!path.extname(req.url)) {
    fileUrl = `.${req.url}/index.html`
  } else {
    fileUrl = `.${req.url}`
  }
  fs.readFile(path.join(__dirname, fileUrl), 'utf-8', (err, data) => {
    res.end(data)
  })
})

httpServer.listen(801, () => {
  console.log("http://127.0.0.1:801");
})