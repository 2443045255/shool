const http = require('http');
const fs = require('fs');
const path = require('path');
const express = require('express');
const socket_io = require('socket.io');
const app = express();

app.use(express.static(path.join(__dirname, 'static')));

app.get('*', (req, res) => {
  res.sendFile(path.resolve(__dirname, 'static', 'index.html'));
});

const httpServer = http.createServer(app);

const io = socket_io(httpServer, {
  cors: {
    origin: "*",
    methods: ["GET", "POST"]
  }
});

fs.writeFile('chat.txt', "", { flag: "a" }, (err) => {
  if (err) {
    console.log("写入文件失败");
  }
});

io.on('connection', (socket) => {
  //发送聊天记录
  // console.log(`${socket.id}连接`);
  fs.readFile('chat.txt', 'utf-8', (err, data) => {
    if (err) {
      console.log("读取聊天记录失败");
    };
    const lines = data.split('\n');
    for (let i = 0; i < lines.length; i++) {
      if (lines[i] != "") {
        io.to(socket.id).emit('old_message', {
          sender: socket.id,
          msg: JSON.parse(lines[i]),
          more: i
        });
      }
    }
  });
  socket.on('message', (data) => {
    const UserMsg = JSON.stringify(data)
    io.emit('message', {
      sender: socket.id,
      msg: data,
      more: 1
    });
    fs.writeFile('chat.txt', `${UserMsg}\n`, { flag: "a" }, (err) => {
      if (err) {
        console.log("写入文件失败");
      }
    });
  });


  socket.on('join', (data) => {
    io.emit("join", {
      join: data,
    });
  });

  socket.on('disconnect', () => {
    // console.log(`${socket.id}失联`);
  });
});
const httpPort = 8001;
httpServer.listen(httpPort, () => {
  console.log(`http://localhost:${httpPort}`);
});