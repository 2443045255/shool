const express = require('express');
const app = express();
const port = 80;
const ipVisitCount = {};
var sortedEntries;

app.use(express.static('./static'));

app.listen(port, () => {
  console.log(`服务器运行在 http://localhost:${port}`);
});