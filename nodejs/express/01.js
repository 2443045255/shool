const express = require("express")
const path = require("path")

const app = express()

app.get("/", (req, res) => {
  // console.log("这是首页")
  res.send("这是首页")
})

app.post("/register", (req, res) => {
  res.send("这是首页")
})

app.listen(80, () => {
  console.log("http://127.0.0.1:80");

})