const net = require('net')
var socket1 = null
var netClient = net.createConnection({
  port:80,
  host:'127.0.0.1'
})

netClient.on("connect",(socket)=>{
 console.log("连接服务器");
})

netClient.on('data',(data)=>{
  console.log(data.toString());
})