const net = require('net')
var netClient = net.createConnection({
  port: 80,
  host: '127.0.0.1'
})

netClient.on("connect", () => {
  console.log("连接服务器成功");
  console.log("这是客户端");
  
})
//接收数据
netClient.on('data', (data) => {
  console.log(data.toString());
})

//键盘输入和发送
process.stdin.on('data', (data) => {
  netClient.write(data)
})