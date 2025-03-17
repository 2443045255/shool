const http = require('http');

function httpTo(ip3) {
    for (let ip4 = 1; ip4 <= 254; ip4++) {
        const options = {
            hostname: `10.240.${ip3}.${ip4}`,
            port: 23333,
            path: '/',
            method: 'GET'
        };

        const req = http.request(options, res => {
            console.log(`http://${options.hostname}:${options.port} 状态码: ${res.statusCode}`);
            res.on('data', d => {
                // process.stdout.write(d);
            });
        });

        req.on('error', error => {
            // console.error('请求错误:', error);
        });

        var timeout = 100;
        var timeoutId = setTimeout(() => {
            // console.error(`${options.hostname}请求超时`);
            req.abort();
        }, timeout);

        req.on('response', () => {
            timeoutId = null
        });

        req.end();
    }
}

httpTo(144)