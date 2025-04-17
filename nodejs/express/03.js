const express = require("express")
const router = require("./router")
require("./router")

const port = 80

const app = express()

app.use(router)


app.listen(port, () => {
  console.log(`http://127.0.0.1:${port}`);

})