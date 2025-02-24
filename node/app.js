const fs = require('fs')
var data = "你好世界"

try {
  fs.writeSync('./hello.txt', data)
} catch (error) {
  console.log("写入失败" + error);

}


/* fs.writeFile('./hello.txt', data, (err) => {
  if (err) throw err;
  console.log("文件写入完成");
}) */