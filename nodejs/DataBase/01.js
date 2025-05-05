const mysql = require("mysql")

const db = mysql.createPool({
  host: '127.0.0.1',
  user: "root",
  password: "",
  database: "test13"
})

// db.query("select 1", (err, results) => {
//   if (err) {
//     return console.log("err:" + err.message)
//   }
// })

let sql = `insert into student set ?`
// 对象里面的属性必须与数据表的字段名一致
let stu = { stuID: 1003, name: "王五", gender: "女" }
db.query(sql, stu, (err, results) => {
  if (err) {
    return console.log("err:" + err.message)
  }
  if (results.affectedRows == 1) {
    console.log("插入成功");

  }
})