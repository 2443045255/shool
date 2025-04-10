const express = require("express")

const app = express()

app.get("/", (req, res) => {
  res.send(req.query)
})

app.listen(666, () => {
  console.log("http://127.0.0.1:666")
})