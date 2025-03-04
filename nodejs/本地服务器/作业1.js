const net = require("net")

const netServer = net.createServer()

netServer.on("connection",()=>{
  console.log(`客户端连接`);
})

netServer.listen(3000,"127.0.0.1",()=>{
  console.log("127.0.0.1:3000");
})