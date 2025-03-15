const http = require("http")

const httpServer = http.createServer()


httpServer.on("request", () => {
  console.log("用户连接");
})

httpServer.listen(80, () => {
  console.log("127.0.0.1:80");
})