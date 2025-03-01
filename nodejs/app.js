const fs = require('fs')
var data1 = "你好世界\n"

var filePath = __dirname
console.log(filePath);

// try {
//   fs.writeSync('./hello.txt', data1)
// } catch (error) {
//   console.log("写入失败" + error);
// }


// fs.writeFile('./hello.txt', data1, { flag: "a" }, (err) => {
//   if (err) throw err;
//   console.log("文件写入完成");
// })

// fs.appendFile("./hello.txt", data1, (err) => {
//   if (err) throw err;
//   console.log("写入成功")
// })

// fs.readFile(filePath + "/txtFile/hello.txt", "utf8", (err, data) => {
//   if (err) throw err;
//   console.log(data);
// })