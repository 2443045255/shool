const express = require("express");

const app = express()

app.get("/", (req, res) => {
  res.redirect("/login")
})

app.get("/login", (req, res) => {
  res.send(req.query)
})

app.use(express.urlencoded({ extended: false }))

app.post("/login", (req, res) => {
  res.send(req.body)
})

app.listen(80, () => {
  console.log("http://127.0.0.1");
})