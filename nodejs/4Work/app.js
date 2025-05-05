const express = require("express")

const app = express()

app.use((req, res, next) => {
  if (req.query.user == "曾庆彬") {
    res.send("账号错误")
  }
  next()
})

app.get("/login", (req, res, next) => {
  if (req.query.user != "张三" && req.query.user != "王五") {
    res.send("登录失败1")
  } else if (req.query.pwd != "123456" && req.query.pwd != "666") {
    res.send("登录失败2")
  } else if (req.query.user == "张三") {
    res.send("恭喜你,张三帅哥,登录成功")
  } else if (req.query.user == "王五") {
    res.send("恭喜你,王五美女,登录成功")
  }
  next()
})

app.get("/register", (req, res, next) => {
  if (req.query.sex == "男") {
    res.send(`输出 恭喜您，${req.query.user}帅哥，注册成功！`)
  } else if (req.query.sex == "女") {
    res.send(`输出 恭喜您，${req.query.user}美女，注册成功！`)
  }
  next()
})




app.listen(3000, () => {
  console.log("http://127.0.0.1:3000")
})