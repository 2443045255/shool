const net = require('net')
const port = 80
var connectionClient = 0
var netServer = net.createServer()

netServer.on("connection", (socket) => {
  connectionClient++
  console.log(`当前客户端数量:${connectionClient}(+1)`);
  socket.write("hello")
  
  socket.on("close",()=>{
    connectionClient--
    console.log(`当前客户端数量:${connectionClient}(-1)`);
  })
})



netServer.listen(port, "127.0.0.1", () => {
  console.log("127.0.0.1:" + port);
})