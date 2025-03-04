/**
 * net.server创建服务器
 * 1.加载net模块
 */
const net = require("net")

const netServer = net.createServer()
//出来客户端连接
netServer.on("connection",(socket)=>{
  console.log(`客户端连接`);
  console.log(`${socket.remoteAddress}:${socket.remotePort}`);
  socket.write("你好世界")
})


//监听客户端连接
netServer.on("listening", () => {
  console.log("开启ing,等待连接");
})
//设置IP和端口
netServer.listen(80,"127.0.0.1",()=>{
  console.log("127.0.0.1:80");
})