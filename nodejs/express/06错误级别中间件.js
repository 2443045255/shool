const express = require("express");

const app = express()

app.get("/", (req, res) => {
  // throw new Error("我错了")
  res.send("/")
})

app.get("/err", (req, res) => {
  throw new Error("我错了")
  res.send("/err")
})

app.use((err, req, res, next) => {
  if (err) console.log(err.message)
  next()
})

app.listen(10086, () => {
  console.log("http://127.0.0.1:10086");

})