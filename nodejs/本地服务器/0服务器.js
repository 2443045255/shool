const net = require('net')
const port = 80
var connectionClient = 0
var netServer = net.createServer()
var socket1 = null

//创建服务器连接事件
netServer.on("connection", (socket) => {
  console.log("这是服务端");
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

//在端口上开启监听
netServer.listen(port, "127.0.0.1", () => {
  console.log("127.0.0.1:" + port);
})

//键盘输入和发送
process.stdin.on('data', (data) => {
  socket1.write(data)
})
