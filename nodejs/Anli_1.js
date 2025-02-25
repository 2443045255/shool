const fs = require('fs')


function copyFileString(oldFIle, newFile) {
  fs.readFile(oldFIle, (err, data) => {
    if (err) throw err;
    if (data) {
      fs.writeFile(newFile, data, (err) => {
        if (err) throw err;
        console.log("复制完成");
      })
    }
  })
}

copyFileString('./hello.txt', './1.txt')