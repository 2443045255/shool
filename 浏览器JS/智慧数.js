// ==UserScript==
// @name         Rxaser智慧树
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  try to take over the world!
// @author       You
// @match        https://studyvideoh5.zhihuishu.com/stuStudy?*
// @icon         data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==
// @grant        none
// ==/UserScript==
(function () {
  'use strict';

  var video_main = document.getElementById("vjs_container_html5_api");
  document.addEventListener("click", function () {
      // 检测网页是否被点击，以防切换课程导致失效
      setTimeout(() => {
          video_main = document.getElementById("vjs_container_html5_api");
          视频自动播放()
          视频暂停自动播放()
      }, 1000);
  });


  window.onload = function () {
      创建界面()
  }

  document.onmousemove = function () {
      getMousePos(event)
  }

  function getMousePos(event) {
      var e = event || window.event;
  }

  var main = document.createElement("div")
  var Rxaser_consoleDiv = document.querySelector(".RxaserConsole")
  function 创建界面() {
      main.className = "Rxaser_main"
      main.style.cssText = `
          position: fixed;
          top: 0;
          left: 0;
          z-index: 2002;
          padding: 10px;
          width: 300px;
          background-color: rgba(255, 255, 255, 0.5);
          border-radius: 6px;
          cursor: move !important;
      `
      main.innerHTML = `
      <button id="Rxaser_btn1" class="Rxaser_btn">一半进度归零</button>
      <button id="Rxaser_btn2" class="Rxaser_btn">视频加速</button>
      <div class="RxaserConsole"></div>
      `
      document.body.append(main)

      var RxaserBtnAll = document.querySelectorAll(".Rxaser_btn")
      RxaserBtnAll.forEach(e => {
          添加css(e)
      })

      var Rxaser_btn1 = document.getElementById("Rxaser_btn1")
      Rxaser_btn1.onclick = function () {
          Rlog("一半进度归零")
          一半进度归零()
      }


      var Rxaser_btn2 = document.getElementById("Rxaser_btn2")
      Rxaser_btn2.onclick = function () {
          Rlog("视频加速")
          video_main.currentTime += 100
          Rlog(video_main.currentTime)
      }

      Rxaser_consoleDiv = document.querySelector(".RxaserConsole")
      Rxaser_consoleDiv.style.cssText = `
          overflow-y: auto;
          height: 200px;
          font-size: 12px;
      `
  }

  function Rlog(value) {
      Rxaser_consoleDiv.innerText += "\n" + value
      Rxaser_consoleDiv.scrollTop = Rxaser_consoleDiv.scrollHeight
  }


  dragElement(main);
  function dragElement(elmnt) {
      var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
      elmnt.onmousedown = function (e) {
          e = e || window.event
          pos3 = e.clientX
          pos4 = e.clientY
          document.onmouseup = function () {
              document.onmouseup = null;
              document.onmousemove = null;
          }
          document.onmousemove = function (e) {
              e = e || window.event;
              pos1 = pos3 - e.clientX;
              pos2 = pos4 - e.clientY;
              pos3 = e.clientX;
              pos4 = e.clientY;
              elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
              elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
          }
      }

  }

  function 添加css(e) {
      e.style.cssText = `
          padding: 5px 10px;
          border: 1px solid;
      `
  }

  function 视频自动播放() {
      var videoAutoPlay = setInterval(() => {
          video_main = document.getElementById("vjs_container_html5_api");
          if (video_main) {
              if (video_main.paused) {
                  Rlog("视频播放")
                  video_main.play()
                  视频暂停自动播放()
              } else {
                  clearInterval(videoAutoPlay);
              }
          }
      }, 0);
  }

  function 一半进度归零() {
      video_main = document.getElementById("vjs_container_html5_api");
      video_main.addEventListener("timeupdate", function () {
          if (video_main.currentTime >= video_main.duration / 2) {
              video_main.currentTime = 0;
              video_main.play()
          }
      });
  }
  function 视频暂停自动播放() {
      var 视频暂停监听 = setInterval(() => {
          video_main = document.getElementById("vjs_container_html5_api");
          if (video_main) {
              video_main.addEventListener("pause", function () {
                  video_main.play()
                  Rlog("视频暂停自动播放")
              })
              clearInterval(视频暂停监听)
          }
      }, 1000);

  }
})();