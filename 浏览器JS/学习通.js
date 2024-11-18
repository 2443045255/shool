// ==UserScript==
// @name         学习通刷课
// @namespace    http://tampermonkey.net/
// @version      2024-11-13
// @description  try to take over the world!
// @author       You
// @match        https://mooc1.chaoxing.com/mycourse/studentstudy*
// @icon         https://www.google.com/s2/favicons?sz=64&domain=chaoxing.com
// @grant        none
// ==/UserScript==

(function () {
    'use strict';

    默认事件1()
    function 默认事件1() {
        let oldadd = EventTarget.prototype.addEventListener
        EventTarget.prototype.addEventListener = function (...args) {
            // console.log('addEventListener', ...args)
            // oldadd.call(this, ...args)
            if (args.length !== 0 && args[0] === 'mouseout') {
                // console.log('劫持鼠标脱出暂停')
                return;
            }
            return oldadd.call(this, ...args)
        }
    }

    // var video_html5_api = document.getElementById("iframe").contentWindow.document.querySelectorAll("iframe")[0].contentWindow.document.getElementById("video_html5_api")
    var video_html5_api
    var pdf_iframe
    document.onclick = function () {
        默认事件1()
        视频元素()
    }
    window.onload = function () {
        循环判断是否暂停()
        判断任务点是否完成()
        循环获取2任务条目()
    }
    // document.getElementById("iframe").contentWindow.document.querySelectorAll("iframe")[document.getElementById("iframe").contentWindow.document.querySelectorAll("iframe").length - 1].contentWindow.document.getElementById("video_html5_api")
    function 视频元素() {
        var putVideo = setInterval(() => {
            if (!获取2个任务的数量()) {
                clearInterval(putVideo)
                return
            }
            var pdf_iframe_url = document.getElementById("iframe").contentWindow.document.querySelectorAll("iframe")[0]["src"]
            if (pdf_iframe_url.toString().includes("pdf")) {
                clearInterval(putVideo)
                pdf()
            } else if (video_html5_api == document.getElementById("iframe").contentWindow.document.querySelectorAll("iframe")[0].contentWindow.document.getElementById("video_html5_api")) {
                console.log(video_html5_api);
                video_html5_api.play()
                视频播放完成()
                clearInterval(putVideo)
            } else {
                video_html5_api = document.getElementById("iframe").contentWindow.document.querySelectorAll("iframe")[0].contentWindow.document.getElementById("video_html5_api")
            }
        }, 1000);
    }
    function 视频播放完成() {
        video_html5_api.addEventListener("ended", function () {
            console.log('播放完成');
            setTimeout(() => {
                切换下一个视频()
            }, 500);
        })
    }
    function 获取2个任务的数量() {
        var posCatalog_nameAll = document.querySelectorAll(".posCatalog_name")
        var 任务元素 = []
        posCatalog_nameAll.forEach(element => {
            if (element.nextSibling.nextSibling != null) {
                // console.log(element["title"], element.nextSibling.nextSibling["value"]);
                if (element.nextSibling.nextSibling["value"] == '2') [
                    任务元素.push(element)
                ]
            }
        });
        if (任务元素.length == 0) {
            return false
        } else {
            return true
        }
    }
    var 任务元素 = []
    function 循环获取2任务条目() {
        setInterval(() => {
            var posCatalog_nameAll = document.querySelectorAll(".posCatalog_name")
            任务元素 = []
            posCatalog_nameAll.forEach(element => {
                if (element.nextSibling.nextSibling != null) {
                    // console.log(element["title"], element.nextSibling.nextSibling["value"]);
                    if (element.nextSibling.nextSibling["value"] == '2') [
                        任务元素.push(element)
                    ]
                }
            });
        }, 1000);
    }
    function 切换下一个视频() {
        var setInterval_1 = setInterval(() => {
            if (任务元素.length != 0) {
                任务元素[0].click()
                视频元素()
                clearInterval(setInterval_1)
            }
        }, 500);

    }
    function pdf() {
        pdf_iframe = document.getElementById("iframe").contentWindow.document.querySelectorAll("iframe")[0].contentWindow.document.getElementById("panView")
        // console.log()
        pdf_iframe.contentWindow.document.querySelectorAll("html")[0].scrollTop = pdf_iframe.contentWindow.document.querySelectorAll("html")[0].scrollHeight
        setTimeout(() => {
            切换下一个视频()
        }, 500);
    }
    function 循环判断是否暂停() {
        var ifVideoPause = setInterval(() => {
            video_html5_api == document.getElementById("iframe").contentWindow.document.querySelectorAll("iframe")[0].contentWindow.document.getElementById("video_html5_api")
            if (video_html5_api.paused) {
                切换下一个视频()
            }
            if (!document.getElementById("iframe").contentWindow.document.querySelectorAll("iframe")[0].contentWindow.document.getElementById("video_html5_api")) {
                切换下一个视频()
            }
        }, 10000);
    }
    function 判断任务点是否完成() {
        var setInterval_2 = setInterval(() => {
            var prev_title = document.querySelector(".prev_title")
            if (任务元素.length != 0) {
                if (prev_title.innerText != 任务元素[0]["title"]) {
                    切换下一个视频()
                    clearInterval(setInterval_2)
                }
            }
        }, 500);

    }
})();