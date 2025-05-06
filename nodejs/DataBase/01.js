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

function db_func(_sql, _stu) {
  let sql = _sql
  // 对象里面的属性必须与数据表的字段名一致
  let stu = _stu
  db.query(sql, stu, (err, results) => {
    if (err) {
      return console.log("err:" + err.message)
    }
    if (results.affectedRows) {
      console.log("执行成功");

    }
    console.log(results);

  })
}

//增加
// db_func("insert into student set ?", { stuID: 1003, name: "王五", gender: "女" })

//修改
// db_func("update student set name=?,gender=? where stuID = ?", ["11", "女", 1004])
// db_func("update student set ? where stuID = ?", [{ name: "22", gender: "男" }, 1004])

//查询
// db_func("select * from student where ?", { name: "22" })

//删除
db_func("delete from student where ?", { name: "22" })