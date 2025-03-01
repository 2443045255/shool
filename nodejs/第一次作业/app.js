const fs = require('fs')
const path = require('path')

fs.readFile(path.join(__dirname, './input.txt'), 'utf-8', (err, data) => {
    if (err) throw err;
    var newData = data //包括空格和回车换行符,输出 35
    var newData1 = data.replace(/\s+/g, '')//去掉所有空白字符,输出 28
    var newData2 = data.replace(/ +/g, '')//去掉所有空格,输出 30
    var newData3 = data.replace(/ +|\r/g, '')//去掉所有空格和回车符,输出 29
    if (data) {
        var data1 = `input.txt文件的字符数:${newData.length}`
        console.log(data1);
        fs.writeFile(path.join(__dirname, './output.txt'), data1, (err) => {
            if (err) throw err;
        })
    }
})