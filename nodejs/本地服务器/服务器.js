const net = require('net')
const port = 80
var connectionClient = 0
var netServer = net.createServer()
var socket1 = null

netServer.on("connection", (socket) => {
  socket1 = socket
  connectionClient++
  console.log(`当前客户端数量:${connectionClient}(+1)`);

  socket.on("close", () => {
    connectionClient--
    console.log(`当前客户端数量:${connectionClient}(-1)`);
  })

  socket.on('data', (data) => {
    console.log(data.toString());
  })
})


netServer.listen(port, "127.0.0.1", () => {
  console.log("127.0.0.1:" + port);
})

process.stdin.on('data',(data)=>{
  socket1.write(data)
})