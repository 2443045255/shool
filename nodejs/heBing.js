const fs = require('fs')

function heBing(arr, newFile) {
  for (let i = 0; i <= arr.length - 1; i++) {
    fs.readFile(arr[i], "utf8", (err, data) => {
      if (err) throw err;
      if (data) {
        fs.writeFile(newFile, data, { flag: "a" }, (err) => {
          if (err) throw err;
        })
      }
    })
  }
  console.log("合并完成");
}

heBing(["./txtFile/file1.txt", "./txtFile/file2.txt"], "./txtFile/file3.txt")