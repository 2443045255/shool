const http = require('http');


var Uport = 23333
var ip3 = 151
var num = 0
setInterval(() => {
  for (let ip4 = 1; ip4 <= 254; ip4++) {
    const options = {
      hostname: `10.240.${ip3}.${ip4}`,
      port: Uport,
      path: '/',
      method: 'GET'
    };
    
    const req = http.request(options, res => {
      console.log(`http://${options.hostname}:${options.port} 状态码: ${res.statusCode}-${num}`);
      res.on('data', d => {
        // process.stdout.write(d);
      });
    });

    req.on('error', error => {
      // console.error('请求错误:', error);
    });

    var timeout = 1000;
    var timeoutId = setTimeout(() => {
      // console.error(`${options.hostname}请求超时`);
      req.abort();
    }, timeout);

    req.on('response', () => {
      timeoutId = null
    });

    req.end();
  }
  num++
}, 2000);