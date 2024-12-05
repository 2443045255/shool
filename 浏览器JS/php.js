// ==UserScript==
// @name         自选题目数量
// @namespace    http://tampermonkey.net/
// @version      2024-12-05
// @description  try to take over the world!
// @author       You
// @match        https://exercism.org/tracks/php
// @icon         https://www.google.com/s2/favicons?sz=64&domain=exercism.org
// @grant        none
// ==/UserScript==

(function () {
  'use strict';
  var progress = document.querySelector('.progress-chart')
  setTimeout(() => {
    console.log('题目自选脚本')
    CreateUserUI()
    确认元素()

  }, 1000);

  function 确认元素() {
    var setInterval_1 = setInterval(() => {
      if (document.querySelector('.progress-chart')) {
        progress = document.querySelector('.progress-chart')
        console.log(progress)
        写入事件()
        clearInterval(setInterval_1)
      }
    }, 1000);
  }

  function CreateUserUI() {
    var Rxaser = `
  <div id="Rxaser" style="padding: 10px;border-radius: 6px;position: fixed;top: 20px;left: 20px;background: rgba(255, 255, 255, 0.6);backdrop-filter: blur(3px);z-index:1000;">
    <div class="Rxaser-div1">
      <p class="Rxaser-div1-title" style="font-size: 12px;color: rgb(84, 84, 84);">完成多少题</p>
      <div class="Rxaser-div1-body" style="margin-top: 8px;">
        <input type="text" style="padding: 3px 5px;outline: none;border-radius: 4px;border: 1px solid;">
        <button id="Rxaser-btn1" style="padding: 5px 15px;border-radius: 4px;border: 1px solid;">确认</button>
      </div>
    </div>
  </div>
    `
    document.body.innerHTML += Rxaser
    写入事件()
  }

  function 写入事件() {
    progress.addEventListener('click', function () {
      console.log(123)
      if (document.getElementById('Rxaser') == null) {
        CreateUserUI()
      } else {
        var Rxaser1 = document.getElementById('Rxaser')
        if (Rxaser1.style.display == 'none') {
          Rxaser1.style.display = 'block'
        } else {
          Rxaser1.style.display = 'none'
        }
      }
    })

    var Rxaser_btn1 = document.getElementById('Rxaser-btn1')
    Rxaser_btn1.onclick = function () {
      完成题目()
    }
  }

  function 完成题目() {
    var input1 = document.querySelector('.Rxaser-div1-body input')

    var progress_title = document.querySelector('.progress-chart>h2>em')
    var progress_bar = document.querySelector('.progress-chart>.c-progress>.bar')
    var progress_liALl = document.querySelectorAll('.progress-chart .exercises a')

    if (input1.value) {
      var comNum = ((parseInt(input1.value) / 110).toFixed(3) * 1000) / 10
      progress_title.innerText = comNum + '%'
      progress_bar.style.width = comNum + '%'

      progress_liALl.forEach((e, index) => {
        if (index <= parseInt(input1.value)) {
          if (e.classList.contains('--started')) {
            e.classList.remove('--started')
            e.classList.add('--completed')
          }
          if (e.classList.contains('--available')) {
            e.classList.remove('--available')
            e.classList.add('--completed')
          }
        }
        var lastLI = progress_liALl[parseInt(input1.value) + 1]
        lastLI.classList.remove('--available')
        lastLI.classList.add('--started')
        if (index > parseInt(input1.value) + 1) {
          e.classList.remove('--completed')
          e.classList.add('--available')
        }
      })
    }

  }

  // Your code here...
})();