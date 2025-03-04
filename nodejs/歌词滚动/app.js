const fs = require("fs")
const path = require("path")


fs.readFile(path.join(__dirname, './lrc.txt'), 'utf8', (err, data) => {
  if (err) throw err;
  if (data) {
    var txtLines = data.split('\r\n')
    // console.log(txtLine);
    //正则[00:00.00]
    var time_reg = /\[(\d{2})\:\[(\d{2})\.\[(\d{2})\]\s*(.+)/
    for (let i = 0; i <= txtLines.length - 1; i++) {
      (function (index) {
        // console.log(txtLines[index]);

        let matches = time_reg.exec(txtLines[index])
        if (matches) {
          console.log(matches);
          
          let m = parseFloat(matches[1])
          let s = parseFloat(matches[2])
          let ms = parseFloat(matches[3])
          var time = m * 60 * 1000 + s * 1000 + ms
          let txt = matches[4]

          setTimeout(() => {
            console.log(txt);
          }, time);
        }

      })(i)
    }
  }
})